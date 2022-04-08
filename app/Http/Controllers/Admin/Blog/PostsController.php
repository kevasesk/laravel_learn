<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Admin\CrudController;

class PostsController extends CrudController
{
    protected $modelClass = \App\Models\Post::class;

    protected $routeClass = \App\Routes\Blog\PostsRoutes::class;

    protected $modelTitle = 'Blog Posts';

    protected $columns = [
        [ 'column' => 'id', 'title' => 'Id'],
        [ 'column' => 'is_active', 'title' => 'Is Active', 'type' => 'boolean' ],
        [ 'column' => 'title', 'title' => 'Title' ],
        [ 'column' => 'url', 'title' => 'Url' ],
        [ 'column' => 'desc', 'title' => 'Description', 'type' => 'text' ],
        [ 'column' => 'thumbnail', 'title' => 'Thumbnail', 'type' => 'image' ],
        [ 'column' => 'categories', 'title' => 'Categories', 'type' => 'relation', 'hidden' => true, 'all' =>  [
            ['id' => 1, 'title' => 'cat1'],
            ['id' => 2, 'title' => 'cat2'],
            ['id' => 3, 'title' => 'cat3'],
        ]],
    ];

    protected $validateRules = [
        'title' => 'required',
        'url' => 'required',
        'is_active' => 'required',
        'thumbnail' => 'image|max:20000',
    ];

    protected $fileAttributes = [
        'thumbnail'
    ];

    protected $fileDir = 'blog/posts';

    protected $relations = 'categories';
}
