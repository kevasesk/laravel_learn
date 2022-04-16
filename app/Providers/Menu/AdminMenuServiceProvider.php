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
                    'title' => 'Customers',
                    'url' => '/admin/customers',
                    'icon' => 'mdi-account'
                ],
                [
                    'title' => 'Pages',
                    'url' => '/admin/pages',
                    'icon' => 'mdi-book-open-page-variant'
                ],
                [
                    'title' => 'Image Blocks',
                    'url' => '/admin/image_blocks',
                ],
                [
                    'title' => 'Subscribers',
                    'url' => '/admin/subscribers',
                ],
                [
                    'title' => 'Menu',
                    'url' => '/admin/menu',
                ],
                [
                    'title' => 'Orders',
                    'url' => '/admin/orders',
                ],
                [
                    'title' => 'Config',
                    'url' => '/admin/config',
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
                    'title' => 'Catalog',
                    'icon' => 'mdi-laptop',
                    'children' => [
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
                    ]
                ],

            ]);
        });
    }
}
