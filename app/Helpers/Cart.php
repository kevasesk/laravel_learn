<?php

namespace App\Helpers;

class Cart
{
    public static function getCurrentCart()
    {
        if(!request()->session()->exists('cart_id')) {
            $cart = new \App\Models\Cart();
            $cart->save();
            request()->session()->put('cart_id', $cart->id);
        }else{
            $sessionCartId = request()->session()->get('cart_id');
            $cart = \App\Models\Cart::query()
                ->where('id','=', $sessionCartId)
                ->where('is_active', '=', 1)
                ->first();
            if(!$cart){
                $cart = new \App\Models\Cart();
                $cart->save();
                request()->session()->put('cart_id', $cart->id);
            }
        }
        return $cart;
    }
}
