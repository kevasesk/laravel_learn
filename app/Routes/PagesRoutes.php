<?php

namespace App\Routes;

class PagesRoutes extends CrudRoutes
{
    public $crudControllerClass = \App\Http\Controllers\Admin\PagesController::class;

    public $routeSuffix = '/admin/pages';

    public $routeSuffixName = 'admin.pages';

}
