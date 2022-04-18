<?php

namespace App\Routes;

class ProductsRoutes extends CrudRoutes
{
    public $crudControllerClass = \App\Http\Controllers\Admin\ProductsController::class;

    public $routeSuffix = '/admin/products';

    public $routeSuffixName = 'admin.products';

}
