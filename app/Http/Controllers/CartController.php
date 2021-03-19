<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('category', $data);
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
        $cart = Auth::user()->carts()->with('product')->get();
        // 總計
        $total_price = 0;
        foreach ($cart as $v) {
            // 判斷是否特價
            if ($v->product->detail['sale']) {
                $price = $v->product->detail['sale'];
            } else {
                $price = $v->product->detail['price'];
            }
            $v->perItemTotalPrice = $v->amount * $price;
            $total_price += $v->perItemTotalPrice;
        }

        $data['data'] = $cart;
        $data['total_price'] = $total_price;
        return view('cart', $data);
    }

}
