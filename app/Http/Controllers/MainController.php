<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Product;
use App\Models\Post;

use Illuminate\Http\Request;

class MainController extends Controller
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
            $breadcrumbs = [
                ['url' => '/', 'title' => 'Home'],
                ['title' => $page->title]
            ];
            return view('page.template', compact('page', 'breadcrumbs'));
        }

        #Search in products
        $product = Product::query()->where('url', '=', $url)->first();
        if($product){
            $breadcrumbs = [
                ['url' => '/', 'title' => 'Home'],
                ['title' => $product->title]
            ];
            return view('product.view', compact('product', 'breadcrumbs'));
        }

        #Search in categories
        $category = Category::query()->where('url', '=', $url)->first();
        if($category){
            $products = $category->products()->paginate(15);
            $breadcrumbs = [
                ['url' => '/', 'title' => 'Home'],
                ['title' => $category->title]
            ];
            return view('category.view', compact('products', 'category', 'breadcrumbs'));
        }

        #Search in blog posts
        $post = Post::query()->where('url', '=', $url)->first();
        if($post){
            $breadcrumbs = [
                ['url' => '/', 'title' => 'Home'],
                ['url' => 'blog', 'title' => 'Blog'],
                ['title' => $post->title]
            ];
            return view('blog.post.view', compact('post', 'breadcrumbs'));
        }

        return abort(404);
    }
}
