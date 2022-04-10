<?php

namespace App\Routes;

class ImageBlockRoutes extends CrudRoutes
{
    public $crudControllerClass = \App\Http\Controllers\Admin\ImageBlockController::class;

    public $routeSuffix = '/admin/image_blocks';

    public $routeSuffixName = 'admin.image-blocks';

}
