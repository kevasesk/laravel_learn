<?php

namespace App\Routes;

class SubscribersRoutes extends CrudRoutes
{
    public $crudControllerClass = \App\Http\Controllers\Admin\SubscriberController::class;

    public $routeSuffix = '/admin/subscribers';

    public $routeSuffixName = 'admin.subscribers';

}
