<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class CartController extends \App\Http\Controllers\Controller
{
    public function index(Request $request)
    {
        $currentCart = \App\Helpers\Cart::getCurrentCart();
        $products = $currentCart->products;
        $cartItems = CartItem::query()->where('cart_id','=', $currentCart->id)->get()->toArray();
        if(!count($products)){
            return redirect('/');
        }
        $cartData = [];
        $subtotal = 0;
        foreach ($cartItems as $cartItem){
            $cartData[$cartItem['product_id']] = $cartItem;
            $subtotal += $cartItem['qty'] * $cartItem['price'];
        }
        $cart = [
            'id' => $currentCart->id,
            'subtotal' => $subtotal,
            'items' => $cartData
        ];
        return view('frontend.cart.index', compact('products', 'cart'));
    }
    public function add(Request $request)
    {
        $id = $request->id;
        $qty = $request->qty;
        $product = Product::query()->where('id', '=', $id)->first();

        $sessionCartId = $request->session()->get('cart_id');
        if(!$sessionCartId) {
            $cart = new Cart();
            $cart->save();
            $cart->products()->attach($product->id, ['qty' => $qty, 'price' => $product->price, 'product_id' => $product->id]);
            //TODO not add products with save id, inscrease qty
            $cart->save();
            $request->session()->put('cart_id', $cart->id);
        }else{
            $cart = Cart::query()->where('id','=', $sessionCartId)->first();
            $cartProducts = CartItem::query()->where('product_id','=', $product->id)->first();
            $newQty = $cartProducts ? $cartProducts->qty + $qty : $qty;
            $metaData = [
                'cart_items.qty' => $newQty,
                'cart_items.price' => $product->price,
                'product_id' => $product->id,
                'cart_items.created_at' => !$cartProducts ? date('Y-m-d H:i:s') : null,
                'cart_items.updated_at' => date('Y-m-d H:i:s'),
            ];
            $cartProducts ? $cart->products()->update($metaData) : $cart->products()->attach($product->id, $metaData);
            $cart->save();
        }
        return back()->with('success', 'Product was added to cart');
    }

    public function back()
    {

    }
    public function clear(Request $request)
    {
        $currentCart = \App\Helpers\Cart::getCurrentCart();
        $currentCart->products()->detach();
        $currentCart->save();
        return back()->with('success', 'YOu have cleared the cart');
    }
    public function checkout(Request $request)
    {
        $currentCart = \App\Helpers\Cart::getCurrentCart();
        $products = $currentCart->products;
        $cartItems = CartItem::query()->where('cart_id','=', $currentCart->id)->get()->toArray();
        $cart = [];
        $subtotal = 0;
        foreach ($cartItems as $cartItem){
            $cart[$cartItem['product_id']] = $cartItem;
            $subtotal += $cartItem['qty'] * $cartItem['price'];
        }
        return view('frontend.cart.checkout', compact('products', 'cart', 'subtotal'));
    }
    public function create(Request $request)
    {
        $request->validate([
            'firstname' => 'required',//TODO trun back validation rules
//            'lastname' => 'required',
//            'email' => 'required|email',
//            'company' => 'required',
//            'phone' => 'required',
//            'city' => 'required',
//            'country' => 'required',
//            'postcode' => 'required',
//            'address' => 'required',
        ]);
        $currentCart = \App\Helpers\Cart::getCurrentCart();
        $currentCart->fill($request->all());
        $currentCart->is_active = 0;
        $currentCart->save();

        $order = new Order();
        $order->cart_id = $currentCart->id;
        $order->status = Order::PENDING_STATUS;
        $order->increment_id = 1000000 + $currentCart->id;
        $order->save();

        return redirect()->route('cart.success');
    }
    public function success(Request $request)
    {
        $currentCart = \App\Helpers\Cart::getCurrentCart();
        if(!$currentCart){
            return redirect()->route('/');
        }
        $order = Order::query()->where('cart_id', '=', $currentCart->id)->first();
        if(!$order){
            return redirect()->route('/');
        }
        $orderIncrement = $order->increment_id;
        $request->session()->remove('cart_id');
        return view('frontend.cart.success', compact('orderIncrement'));
    }
}
