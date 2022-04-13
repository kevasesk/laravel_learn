<?php

namespace App\Routes;

class OrdersRoutes extends CrudRoutes
{
    public $crudControllerClass = \App\Http\Controllers\Admin\OrdersController::class;

    public $routeSuffix = '/admin/orders';

    public $routeSuffixName = 'admin.orders';

}
