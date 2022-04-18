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
        return view('frontend.page.home', compact('images'));
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
        $category = Category::query()->where('url', '=', $url)->first();
        if($category){
            $products = $category->products()->paginate(15);
            $breadcrumbs = [
                ['url' => '/', 'title' => 'Home'],
                ['title' => $category->title]
            ];
            return view('frontend.category.view', compact('products', 'category', 'breadcrumbs'));
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
