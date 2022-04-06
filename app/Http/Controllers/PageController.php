<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $page = Page::query()->where('id', '=', 1)->first();
        return view('page.home', compact('page'));
    }

    public function show($url)
    {
        #Search in pages
        $page = Page::query()->where('url', '=', $url)->first();
        if($page){
            return view('page.template', compact('page'));
        }

        #Search in products
        $product = Product::query()->where('url', '=', $url)->first();
        if($product){
            return view('product.view', compact('product'));
        }

        return abort(404);
//        return view('page.template', compact('entity'));
    }
}
