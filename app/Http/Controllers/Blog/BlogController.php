<?php

namespace App\Http\Controllers\Blog;

use App\Models\Post;

class BlogController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $posts = Post::query()->paginate(6);
        $page = ['title' => 'Blog'];
        return view('frontend.blog.index', compact('posts', 'page'));
    }
}
