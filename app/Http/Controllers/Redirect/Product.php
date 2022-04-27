<?php

namespace App\Http\Controllers\Redirect;

class Product
{
    public static function process($id)
    {
        $product = \App\Models\Product::query()->where('id', '=', $id)->first();
        if($product){
            $breadcrumbs = [
                ['url' => '/', 'title' => 'Home'],
                ['title' => $product->title]
            ];
            $addToCartAttribute = !$product->getIsInStock() ? 'disabled' : '';
            return view('frontend.product.view', compact('product', 'breadcrumbs', 'addToCartAttribute'));
        }
        return false;
    }
}
