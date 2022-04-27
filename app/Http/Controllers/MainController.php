<?php

namespace App\Http\Controllers;

use App\Models\Redirect;

use App\Models\Category;
use App\Models\Page;
use App\Models\Product;
use App\Models\Post;
use App\Models\ImageBlock;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $imageBlocks = ImageBlock::all();
        $images = [];
        foreach ($imageBlocks as $imageBlock){
            $images[$imageBlock['key']] = $imageBlock;
        }
        $popular = Product::query()->where('is_popular', '=', 1)->limit(6)->get();
        $topRated = Product::query()->where('is_top_rated', '=', 1)->limit(6)->get();
        $newest = Product::query()->where('is_new', '=', 1)->limit(6)->get();
        $branded = Product::query()->orderBy('brand')->limit(6)->get();// ??
        $featured = Product::query()->where('is_featured', '=', 1)->get();// ??
        $featuredMap = [];
        foreach ($featured as $product){
            if(!isset($featuredMap['All']) || count($featuredMap['All']) < 5){
                $featuredMap['All'][] = $product;
            }
            if(!isset($featuredMap[$product->brand]) || count($featuredMap[$product->brand]) < 5){
                $featuredMap[$product->brand][] = $product;
            }
        }

        return view('frontend.page.home', compact('images', 'popular', 'topRated', 'newest', 'branded', 'featuredMap'));
    }

    public function show($url)
    {
        $redirect = Redirect::query()->where('url', '=', $url)->first();
        if(!$redirect){
            return abort(404);
        }
        switch ($redirect->type){
            case Redirect::TYPE_PAGE: return \App\Http\Controllers\Redirect\Page::process($redirect->entity_id);
            case Redirect::TYPE_PRODUCT: return \App\Http\Controllers\Redirect\Product::process($redirect->entity_id);
            case Redirect::TYPE_CATEGORY: return \App\Http\Controllers\Redirect\Category::process($redirect->entity_id);
            case Redirect::TYPE_BLOG_POST: return \App\Http\Controllers\Redirect\Blog\Post::process($redirect->entity_id);
        }
    }
}
