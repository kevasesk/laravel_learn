<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        $columns = [
            'Id',
            'Is Active',
            'Title',
            'Url',
            'Desc',
            'Thumbnail',
        ];

        $posts = Post::all();

        return view('admin.posts.index',[
            'columns' => $columns,
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        return view('admin.posts.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required',
            'is_active' => 'required',
            'thumbnail' => 'image|max:20000',
        ]);

        if(!$request->id){
            $post = new Post();
        }else{
            $post = Post::query()->where('id','=', $request->id)->first();
        }

        if($request->file('thumbnail')){
            $thumbnailPath = $request->file('thumbnail')->store('posts', 'public');
        }else{
            $thumbnailPath = $post->thumbnail;
        }


        $post->title = $request->title;
        $post->desc = $request->desc ?? '' ;
        $post->url = $request->url;
        $post->is_active = $request->is_active;
        $post->thumbnail = $thumbnailPath;
        $post->save();
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::query()->where('id','=', $id)->first();
        return view('admin.posts.create', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::query()->where('id','=', $id)->first();
        $post->delete();
        return redirect()->route('admin.posts.index');

    }
    public function send()
    {
        $post = Post::query()->where('id','=',5)->first();
        \Illuminate\Support\Facades\Mail::to('to@example.com')->send(new \App\Mail\Test($post));

    }
}
