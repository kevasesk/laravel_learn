<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends CrudController
{
    protected $modelClass = \App\Models\Category::class;

    protected $routeClass = \App\Routes\CategoriesRoutes::class;

    protected $modelTitle = 'Categories';

    protected $redirectType = \App\Models\Redirect::TYPE_CATEGORY;

    protected $columns = [
        [ 'column' => 'id', 'title' => 'Id', 'hiddenInForm' => true],
        [ 'column' => 'title', 'title' => 'Title' ],
        [ 'column' => 'url', 'title' => 'Url' ],
        [ 'column' => 'is_active', 'title' => 'Is Active', 'type' => 'boolean' ],
        [ 'column' => 'parent_id', 'title' => 'Parent ID'],
        [ 'column' => 'thumbnail', 'title' => 'Thumbnail', 'type'=> 'image' ],
    ];

    protected $validateRules = [
        'title' => 'required',
        'is_active' => 'required',
        'thumbnail' => 'image|max:20000',
    ];

    protected $fileDir = 'categories';

    protected $fileAttributes = [
        'thumbnail'
    ];
//
//    protected $relations = 'products';
}
