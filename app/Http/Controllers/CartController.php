<?php

namespace App\Http\Controllers;

use App\Basic;
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
        $res = Product::find($id);
        abort_if(!$res, 404);
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
        $product_id = (int) $request->input('product_id');
        $count = (int) $request->input('count');
        $product = Product::find($product_id);

        // 檢查庫存
        if ($count >= $product->amount) {
            return json_encode(['msg' => 'Inventory Shortage']);
        }

        $productInCarts = Auth::user()->carts()->where('product_id', $product_id)->first();
        if (!$productInCarts) {
            // 購物車不存在此商品
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $product_id,
                'amount' => $count,
            ]);
        } else {
            // 購買數量
            $add = $productInCarts->amount + $count;

            // 購物車存在此商品
            Cart::where('user_id', Auth::id())->where('product_id', $product_id)->update([
                'amount' => $add,
            ]);
        }

        return json_encode(['msg' => 'Add To Cart Successfully']);

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
        foreach ($cart as $v) {
            // 判斷是否特價
            if (session('status')) {
                $price = $v->per_price;
                $v->perItemTotalPrice = $v->total_price;

            } else {
                if ($v->product->detail['sale']) {
                    $price = $v->product->detail['sale'];
                } else {
                    $price = $v->product->detail['price'];
                }
                $v->perItemTotalPrice = $v->amount * $price;
            }

            $total_price += $v->perItemTotalPrice;
        }
        $data['data'] = $cart;
        $data['total_price'] = $total_price;
        /**
         * 運送
         */
        $basic = Basic::first();
        if ($basic) {
            $data['basic'] = $basic;
        }
        /**
         * 訂單資料
         */
        $data['user'] = Auth::user();

        if (session('status')) {
            // 從前一頁過來
            return view('cart2', $data);
        } else {
            return view('cart', $data);
        }

    }

    public function update_cart(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'mobile' => ['required', 'numeric'],
            'address' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        foreach ($request->input('order') as $id => $amount) {
            $cart = Cart::find($id);
            if (!$cart) {
                continue;
            }
            if ($cart->product->detail['sale']) {
                $price = $cart->product->detail['sale'];
            } else {
                $price = $cart->product->detail['price'];
            }
            $cart->amount = $amount;
            $cart->total_price = $amount * $price;
            $cart->per_price = $price;
            $cart->receipt = [
                'first_name' => $request->input('first_name'),
                'email' => $request->input('email'),
                'last_name' => $request->input('last_name'),
                'mobile' => $request->input('mobile'),
                'address' => $request->input('address'),
                'city' => $request->input('city'),
                'zip_code' => $request->input('zip_code'),
                'country' => $request->input('country'),
                'note' => $request->input('note'),
                'state' => $request->input('state'),
            ];
            $cart->save();
        }
        return redirect('/cart')->with('status', 'back');

    }

    public function make_order()
    {
        DB::beginTransaction();
        try {
            $user_cart = Auth::user()->carts()->select(['product_id', 'amount', 'total_price', 'per_price'])->get()->toArray();
            if (count($user_cart) == 0) {
                return redirect('/cart');
            }
            // 判斷庫存
            $shortage = [];
            $price = 0;
            foreach ($user_cart as $v) {
                $product = Product::find($v['product_id']);
                $pro_amount = $product->amount;
                $pro_amount -= $v['amount'];
                if ($pro_amount <= 0) {
                    $shortage[] = $v['product_id'];
                    continue;
                }
                $product->update([
                    'amount' => $pro_amount,
                ]);
                $price += $v['total_price'];
            }

            if (count($shortage) > 0) {
                throw new Exception();
            }
            $receipt = Auth::user()->carts()->first()->receipt;
            $res = Order::create([
                'order_id' => Auth::id() . '_' . time() . '_' . random_int(10, 99),
                'user_id' => Auth::id(),
                'cart_info' => $user_cart,
                'status' => 1,
                'price' => $price,
                'receipt' => $receipt,
            ]);
            Auth::user()->carts()->delete();
            DB::commit();
            return redirect('/order/list');
        } catch (\Throwable $e) {
            Log::info('CartController.make_order:' . $e->getMessage());
            DB::rollback();
            return redirect('/cart')->with('shortage', $shortage);
        }
    }

}
