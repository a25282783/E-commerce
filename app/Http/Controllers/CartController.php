<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Order;
use App\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function product($id)
    {
        $res = Product::with('category')->findorFail($id);
        $data['data'] = $res;
        return view('product', $data);
    }

    public function category($id)
    {
        $res = Category::find($id);
        abort_if(!$res, 404);
        $data['data'] = $res->products()->orderBy('id', 'desc')->paginate(12);
        $data['name'] = $res->name;
        return view('category', $data);
    }

    public function product_all()
    {
        $data['data'] = Product::orderBy('id', 'desc')->paginate(12);
        return view('product_all', $data);
    }

    public function addToCart(Request $request)
    {
        $input = $request->only([
            'product_id', 'amount', 'color', 'size', 'pack',
        ]);
        if ((int) $input['amount'] < 1) {
            return back()->with('status', '數量不對');
        }
        $product_id = (int) $input['product_id'];
        $count = (int) $input['amount'];
        $product = Product::findOrFail($product_id);

        // 檢查庫存
        if ($count >= $product->amount) {
            return back()->with('status', '庫存不足');
        }

        $productInCarts = Auth::user()->carts()->where('product_id', $product_id);
        if (isset($input['color'])) {
            $productInCarts = $productInCarts->where('color', $input['color']);
        }
        if (isset($input['size'])) {
            $productInCarts = $productInCarts->where('size', $input['size']);
        }
        if (isset($input['pack'])) {
            $productInCarts = $productInCarts->where('pack', $input['pack']);
        }
        $productInCarts = $productInCarts->first();

        if (!$productInCarts) {
            // 購物車不存在此商品
            $input['user_id'] = Auth::id();
            $input['per_price'] = $product->price;
            Cart::create($input);
        } else {
            // 購買數量
            $add = $productInCarts->amount + $count;

            // 購物車存在此商品
            Cart::where('user_id', Auth::id())->where('product_id', $product_id)->update([
                'amount' => $add,
            ]);
        }

        return back()->with('status', '1');

    }

    public function dropToCart(Request $request)
    {
        $id = (int) $request->input('id');

        Cart::find($id)->delete();
        return response('');
    }

    public function cart()
    {
        /**
         * 商品
         */
        $cart = Auth::user()->carts()->with('product')->get();
        // 總計
        $total_price = 0;
        foreach ($cart as $k => $v) {
            if (is_null($v->product)) {
                unset($cart[$k]);
                continue;
            }
            // 判斷是否特價
            // if (session('status')) {
            //     $price = $v->per_price;
            //     $v->perItemTotalPrice = $v->total_price;

            // } else {
            //     if ($v->product->detail['sale']) {
            //         $price = $v->product->detail['sale'];
            //     } else {
            //         $price = $v->product->detail['price'];
            //     }
            //     $v->perItemTotalPrice = $v->amount * $price;
            // }
            $v->perItemTotalPrice = $v->amount * $v->product->price;
            $total_price += $v->perItemTotalPrice;
        }
        $data['carts'] = $cart;
        $data['total_price'] = $total_price;
        /**
         * 運送
         */
        // $basic = Basic::first();
        // if ($basic) {
        //     $data['basic'] = $basic;
        // }
        /**
         * 訂單資料
         */
        $data['user'] = Auth::user();
        return view('cart_show', $data);

        // if (session('status')) {
        //     // 從前一頁過來
        //     dd(1);
        //     return view('cart2', $data);
        // } else {
        //     dd(2);
        //     return view('cart', $data);
        // }

    }

    public function update_cart(Request $request)
    {
        $order = $request->input('order');
        if (is_null($order)) {
            return back()->with('status', '購物車沒有商品');
        }
        $order_id_array = array_keys($order);
        $carts = Cart::with('product')->find($order_id_array);
        $order_price = 0;
        foreach ($carts as $cart) {
            if (is_null($cart->product)) {
                continue;
            }
            if ($order[$cart->id] < 1) {
                return back()->with('status', '數量不對');
            }
            $data = [
                'amount' => $order[$cart->id],
                'per_price' => $cart->product->price,
                'total_price' => $order[$cart->id] * $cart->product->price,
            ];
            $cart->update($data);
            $order_price += $order[$cart->id] * $cart->product->price;
        }
        $user = Auth::user();
        return view('checkout', compact('carts', 'user', 'order_price'));

    }

    public function make_order(Request $request)
    {
        DB::beginTransaction();
        $shortage = [];
        $newOrder = Order::create([
            'serial_id' => Auth::id() . '_' . time() . '_' . random_int(10, 99),
            'user_id' => Auth::id(),
            'status' => 1,
            'total_price' => 0,
        ]);
        $newOrder->receipt = $request->all();
        $newOrder->save();
        try {
            $user_cart = Auth::user()->carts()->has('product')->with('product')->get();
            if (count($user_cart) == 0) {
                return redirect('/cart');
            }
            // 建立訂單
            // TODO 運費
            $ship_fee = 60;
            // 訂單總金額
            $price = 0;
            foreach ($user_cart as $v) {
                // 更新庫存
                try {
                    DB::update("update products set amount = amount-{$v->amount} where `id` = {$v->product_id} and `status` = 1 ");
                } catch (\Throwable $th) {
                    $shortage[] = $v->product->name;
                    continue;
                }
                $price += $v->product->price * $v->amount;
                $newOrder->products()->attach(
                    [
                        $v->product_id => [
                            'per_price' => $v->product->price,
                            'per_amount' => $v->amount,
                            'detail' => json_encode(array($v->color, $v->size, $v->pack)),
                        ],
                    ]
                );
            }
            // 庫存異常
            if (count($shortage) > 0) {
                throw new Exception();
            }
            // 流程通過，訂單金額建立
            $newOrder->total_price = $ship_fee + $price;
            $newOrder->save();

            Auth::user()->carts()->delete();
            DB::commit();
            return redirect('/order/confirm')->with('order_id', $newOrder->id);
        } catch (\Throwable $e) {
            Log::info('CartController.make_order:' . $e->getMessage());
            DB::rollback();
            if (count($shortage) > 0) {
                $status = implode(',', $shortage) . '  庫存不足！';
            } else {
                $status = '無法結帳，請聯絡我們！';
            }
            return redirect('/cart')->with('status', $status);
        }
    }

    public function order_confirm()
    {
        if (is_null(session('order_id'))) {
            return redirect('/');
        }
        $order = Order::find(session('order_id'));
        return view('order_confirm', compact('order'));
    }

}
