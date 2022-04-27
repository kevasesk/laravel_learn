<?php

namespace App\Http\Controllers\Redirect\Blog;

class Post
{
    public static function process($id)
    {
        $post = \App\Models\Post::query()->where('id', '=', $id)->first();
        if($post){
            $breadcrumbs = [
                ['url' => '/', 'title' => 'Home'],
                ['url' => 'blog', 'title' => 'Blog'],
                ['title' => $post->title]
            ];
            return view('frontend.blog.post.view', compact('post', 'breadcrumbs'));
        }
        return false;
    }
}
