<?php

namespace App\Http\Controllers\Admin;

class OrdersController extends CrudController
{
    protected $modelClass = \App\Models\Order::class;

    protected $routeClass = \App\Routes\OrdersRoutes::class;

    protected $modelTitle = 'Orders';

    protected $columns = [
        [ 'column' => 'id', 'title' => 'Id', 'hidden' => true],
        [ 'column' => 'increment_id', 'title' => 'Increment ID' ],
        [ 'column' => 'cart_id', 'title' => 'Cart ID' ],
        [ 'column' => 'status', 'title' => 'Status' ],
    ];

//    protected $validateRules = [
//        'email' => 'required',
//    ];

//    protected $fileDir = 'customers';
//
//    protected $relations = 'categories';
}
