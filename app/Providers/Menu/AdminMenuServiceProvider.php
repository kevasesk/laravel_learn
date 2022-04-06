<?php

namespace App\Providers\Menu;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AdminMenuServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view){//TODO improve only for admin views
            $view->with('adminMenu', [
                [
                    'title' => 'Dashboard',
                    'url' => 'dashboard',
                ],
                [
                    'title' => 'Blog',
                    'url' => 'posts',
                    'icon' => 'mdi-newspaper'
                ],
                [
                    'title' => 'Pages',
                    'url' => 'pages',
                    'icon' => 'mdi-book-open-page-variant'
                ],
                [
                    'title' => 'Products',
                    'url' => 'products',
                    'icon' => 'mdi-laptop'
                ],
            ]);
        });
    }
}
