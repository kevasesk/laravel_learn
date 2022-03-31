<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PagesController extends Controller
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
       return view('admin.posts.create');
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
            'url' => 'required|unique:posts',
            'is_active' => 'required',
            'thumbnail' => 'required|image|max:20000',
        ]);
        $thumbnailPath = $request->file('thumbnail')->store('posts', 'public');

        $newPost = new Post();
        $newPost->title = $request->title;
        $newPost->desc = $request->desc ?? '' ;
        $newPost->url = $request->url;
        $newPost->is_active = $request->is_active;
        $newPost->thumbnail = $thumbnailPath;
        $newPost->save();
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function send()
    {
        $post = Post::query()->where('id','=',5)->first();
        \Illuminate\Support\Facades\Mail::to('to@example.com')->send(new \App\Mail\Test($post));

    }
}
