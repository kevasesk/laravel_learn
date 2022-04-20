<?php

namespace App\Http\Controllers\Admin;

class CustomerController extends CrudController
{
    protected $modelClass = \App\Models\Customer::class;

    protected $routeClass = \App\Routes\CustomersRoutes::class;

    protected $modelTitle = 'Customers';

    protected $columns = [
        [ 'column' => 'id', 'title' => 'Id', 'hiddenInForm' => true],
        [ 'column' => 'firstname', 'title' => 'Firstname' ],
        [ 'column' => 'lastname', 'title' => 'Lastname' ],
        [ 'column' => 'email', 'title' => 'Email' ],

        [ 'column' => 'company', 'title' => 'Company', 'hiddenInList' => true ],
        [ 'column' => 'phone', 'title' => 'Phone', 'hiddenInList' => true  ],
        [ 'column' => 'country', 'title' => 'Country', 'hiddenInList' => true  ],
        [ 'column' => 'city', 'title' => 'City', 'hiddenInList' => true  ],
        [ 'column' => 'postcode', 'title' => 'Postcode', 'hiddenInList' => true  ],
        [ 'column' => 'address', 'title' => 'Address', 'type' => 'text', 'hiddenInList' => true ],

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
