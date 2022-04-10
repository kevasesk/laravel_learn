<?php

namespace App\Http\Controllers\Admin;

class CustomerController extends CrudController
{
    protected $modelClass = \App\Models\Customer::class;

    protected $routeClass = \App\Routes\CustomersRoutes::class;

    protected $modelTitle = 'Customers';

    protected $columns = [
        [ 'column' => 'id', 'title' => 'Id'],
        [ 'column' => 'firstname', 'title' => 'Firstname' ],
        [ 'column' => 'lastname', 'title' => 'Lastname' ],
        [ 'column' => 'email', 'title' => 'Email' ],

        [ 'column' => 'company', 'title' => 'Company' ],
        [ 'column' => 'phone', 'title' => 'Phone' ],
        [ 'column' => 'country', 'title' => 'Country' ],
        [ 'column' => 'city', 'title' => 'City' ],
        [ 'column' => 'postcode', 'title' => 'Postcode' ],
        [ 'column' => 'address', 'title' => 'Address', 'type' => 'text' ],

        [ 'column' => 'is_subscribed', 'title' => 'Is Subscribed', 'type' => 'boolean' ],
    ];

    protected $validateRules = [
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required',
    ];

//    protected $fileDir = 'customers';
//
//    protected $relations = 'categories';
}
