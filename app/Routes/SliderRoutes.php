<?php

namespace App\Routes;

class SliderRoutes extends CrudRoutes
{
    public $crudControllerClass = \App\Http\Controllers\Admin\SliderController::class;

    public $routeSuffix = '/admin/slider';

    public $routeSuffixName = 'admin.slider';

}
