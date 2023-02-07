<?php

namespace App\Http\Controllers\Redirect;

use App\Models\Category as CategoryModel;
use App\Models\Product as ProductModel;

class Category
{
    public static function process($id)
    {
        $category = CategoryModel::query()->where('id', '=', $id)->first();
        if($category){
            $products = $category->products()->get();
            $breadcrumbs = [
                ['url' => '/', 'title' => 'Home'],
                ['title' => $category->title]
            ];
            return view('frontend.category.view', compact('products', 'category', 'breadcrumbs'));
        }
        return false;
    }
}
