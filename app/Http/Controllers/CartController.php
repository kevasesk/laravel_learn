<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends \App\Http\Controllers\Controller
{
    public function index(Request $request)
    {
        $currentCart = $this->getCurrentCart($request);
        $products = $currentCart->products;
        if(!count($products)){
            return redirect('/');//todo add message that cart is empty
        }
        $cart = [
            'id' => $currentCart->id,
            'subtotal' => 123,//TODO hardcode
        ];
        //TODO get price and qty from cart_items
        return view('cart.index', compact('products', 'cart'));
    }
    public function add(Request $request, $id)
    {
        $product = Product::query()->where('id', '=', $id)->first();

        if(!$request->session()->exists('cart_id')) {
            $cart = new Cart();
            $cart->products()->attach($product->id, ['qty' => 1, 'price' => $product->price, 'product_id' => $product->id]);
            //TODO not add products with save id, inscrease qty
            $cart->save();
            $request->session()->put('cart_id', $cart->id);
        }else{
            $sessionCartId = $request->session()->get('cart_id');
            $cart = Cart::query()->where('id','=', $sessionCartId)->first();
            $cart->products()->attach($product->id, ['qty' => 1, 'price' => $product->price, 'product_id' => $product->id]);
            //TODO not add products with save id, inscrease qty
            $cart->save();
        }
        return back();
    }
    public function getCurrentCart(Request $request)
    {
        //TODO make global?
        if(!$request->session()->exists('cart_id')) {
            $cart = new Cart();
            $cart->save();
            $request->session()->put('cart_id', $cart->id);
        }else{
            $sessionCartId = $request->session()->get('cart_id');
            $cart = Cart::query()->where('id','=', $sessionCartId)->first();
        }
        return $cart;
    }
    public function back()
    {

    }
    public function clear(Request $request)
    {
        $currentCart = $this->getCurrentCart($request);
        $currentCart->products()->detach();
        $currentCart->save();
        return back();
    }
    public function checkout()
    {

    }
    public function success()
    {

    }
}
