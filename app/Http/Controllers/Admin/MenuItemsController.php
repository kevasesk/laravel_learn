<?php

namespace App\Http\Controllers\Admin;

class MenuItemsController extends CrudController
{
    protected $modelClass = \App\Models\MenuItem::class;

    protected $routeClass = \App\Routes\MenuItemsRoutes::class;

    protected $modelTitle = 'Menu';

    protected $columns = [
        [ 'column' => 'id', 'title' => 'Id', 'hiddenInForm' => true],
        [ 'column' => 'title', 'title' => 'Title' ],
        [ 'column' => 'url', 'title' => 'Url' ],
        [ 'column' => 'parent_id', 'title' => 'Parent ID' ],
        [ 'column' => 'icon', 'title' => 'icon' ],
    ];

    protected $validateRules = [
        'title' => 'required',
    ];

//    protected $fileDir = 'customers';
//
//    protected $relations = 'categories';
}
