<?php

namespace App\Routes;

class CategoriesRoutes extends CrudRoutes
{
    public $crudControllerClass = \App\Http\Controllers\Admin\CategoriesController::class;

    public $routeSuffix = '/admin/categories';

    public $routeSuffixName = 'admin.categories';

}
