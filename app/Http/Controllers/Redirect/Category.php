<?php

namespace App\Http\Controllers\Redirect;

use App\Models\Category as CategoryModel;

class Category
{
    public static function process($id)
    {
        $category = CategoryModel::query()->where('id', '=', $id)->first();
        if($category){
            $searchModel = new \App\Search\ElasticsearchRepository();
            $products = $searchModel->filterProducts($category)->paginate(6);
            $breadcrumbs = [
                ['url' => '/', 'title' => 'Home'],
                ['title' => $category->title]
            ];
            return view('frontend.category.view', compact('products', 'category', 'breadcrumbs'));
        }
        return false;
    }
}
