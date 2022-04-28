<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Admin\CrudController;

class CategoriesController extends CrudController
{
    protected $modelClass = \App\Models\BlogCategory::class;

    protected $routeClass = \App\Routes\Blog\CategoriesRoutes::class;

    protected $modelTitle = 'Blog Categories';

    protected $columns = [
        [ 'column' => 'id', 'title' => 'Id' ],
        [ 'column' => 'is_active', 'title' => 'Is Active', 'type' => 'boolean' ],
        [ 'column' => 'title', 'title' => 'Title' ],
        [ 'column' => 'url', 'title' => 'Url' ],
        [ 'column' => 'desc', 'title' => 'Description', 'type' => 'text', 'hiddenInList' => true ],
        [ 'column' => 'thumbnail', 'title' => 'Thumbnail', 'type' => 'image' ],
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

    protected $fileDir = 'blog/categories';

    protected $relations = 'posts';
}
