<?php

namespace App\Http\Controllers\Admin;

class SubscriberController extends CrudController
{
    protected $modelClass = \App\Models\Subscriber::class;

    protected $routeClass = \App\Routes\SubscribersRoutes::class;

    protected $modelTitle = 'Subscribers';

    protected $columns = [
        [ 'column' => 'id', 'title' => 'Id'],
        [ 'column' => 'email', 'title' => 'Email' ],
    ];

    protected $validateRules = [
        'email' => 'required',
    ];

//    protected $fileDir = 'customers';
//
//    protected $relations = 'categories';
}
