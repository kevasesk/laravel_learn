<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PagesController extends CrudController
{
    protected $modelClass = \App\Models\Page::class;

    protected $routeClass = \App\Routes\PagesRoutes::class;

    protected $modelTitle = 'Pages';

    protected $redirectType = \App\Models\Redirect::TYPE_PAGE;

    protected $columns = [
        [ 'column' => 'id', 'title' => 'Id', 'hiddenInForm' => true],
        [ 'column' => 'is_active', 'title' => 'Is Active', 'type' => 'boolean'],
        [ 'column' => 'title', 'title' => 'Title'],
        [ 'column' => 'url', 'title' => 'Url'],
        [ 'column' => 'content', 'title' => 'Content', 'type'=> 'text'],
    ];

    protected $validateRules = [
        'title' => 'required',
        'is_active' => 'required',
    ];
}
