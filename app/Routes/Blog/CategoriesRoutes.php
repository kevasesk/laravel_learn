<?php

namespace App\Routes\Blog;

class CategoriesRoutes extends \App\Routes\CrudRoutes
{
    public $crudControllerClass = \App\Http\Controllers\Admin\Blog\CategoriesController::class;

    public $routeSuffix = '/admin/blog/categories';

    public $routeSuffixName = 'admin.blog.categories';

}
