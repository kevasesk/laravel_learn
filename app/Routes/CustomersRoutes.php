<?php

namespace App\Routes;

class CustomersRoutes extends CrudRoutes
{
    public $crudControllerClass = \App\Http\Controllers\Admin\CustomerController::class;

    public $routeSuffix = '/admin/customers';

    public $routeSuffixName = 'admin.customers';

}
