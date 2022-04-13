<?php

namespace App\Routes;

class MenuItemsRoutes extends CrudRoutes
{
    public $crudControllerClass = \App\Http\Controllers\Admin\MenuItemsController::class;

    public $routeSuffix = '/admin/menu';

    public $routeSuffixName = 'admin.menu';

}
