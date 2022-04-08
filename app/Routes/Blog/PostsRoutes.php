<?php

namespace App\Routes\Blog;

class PostsRoutes extends \App\Routes\CrudRoutes
{
    public $crudControllerClass = \App\Http\Controllers\Admin\Blog\PostsController::class;

    public $routeSuffix = '/admin/blog/posts';

    public $routeSuffixName = 'admin.blog.posts';

}
