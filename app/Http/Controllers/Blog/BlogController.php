<?php

namespace App\Http\Controllers\Blog;

use App\Models\Post;

class BlogController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $posts = Post::all();
        $page = ['title' => 'Blog'];
        return view('blog.index', compact('posts', 'page'));
    }
}
