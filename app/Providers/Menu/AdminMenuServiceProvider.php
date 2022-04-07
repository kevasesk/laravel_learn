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
                    'url' => '/admin/dashboard',
                ],
                [
                    'title' => 'Blog',
                    'icon' => 'mdi-newspaper',
                    'children' => [
                        [
                            'title' => 'Posts',
                            'url' => '/admin/blog/posts',
                            'icon' => 'mdi-book-open-page-variant'
                        ],
                        [
                            'title' => 'Categories',
                            'url' => '/admin/blog/categories',
                            'icon' => 'mdi-book-open-page-variant'
                        ],
                    ]
                ],
                [
                    'title' => 'Pages',
                    'url' => '/admin/pages',
                    'icon' => 'mdi-book-open-page-variant'
                ],
                [
                    'title' => 'Products',
                    'url' => '/admin/products',
                    'icon' => 'mdi-laptop'
                ],
                [
                    'title' => 'Categories',
                    'url' => '/admin/categories',
                    'icon' => 'mdi-receipt'
                ],
            ]);
        });
    }
}
