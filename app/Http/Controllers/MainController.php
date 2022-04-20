<?php

namespace App\Http\Controllers;

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
        #Search in pages
        $page = Page::query()->where('url', '=', $url)->first();
        if($page){
            $breadcrumbs = [
                ['url' => '/', 'title' => 'Home'],
                ['title' => $page->title]
            ];
            return view('frontend.page.template', compact('page', 'breadcrumbs'));
        }

        #Search in products
        $product = Product::query()->where('url', '=', $url)->first();
        if($product){
            $breadcrumbs = [
                ['url' => '/', 'title' => 'Home'],
                ['title' => $product->title]
            ];
            $addToCartAttribute = !$product->getIsInStock() ? 'disabled' : '';
            return view('frontend.product.view', compact('product', 'breadcrumbs', 'addToCartAttribute'));
        }

        #Search in categories
        $result = \App\Http\Controllers\Catalog\Category::process($url);
        if($result){
            return $result;
        }

        #Search in blog posts
        $post = Post::query()->where('url', '=', $url)->first();
        if($post){
            $breadcrumbs = [
                ['url' => '/', 'title' => 'Home'],
                ['url' => 'blog', 'title' => 'Blog'],
                ['title' => $post->title]
            ];
            return view('frontend.blog.post.view', compact('post', 'breadcrumbs'));
        }

        return abort(404);
    }
}
