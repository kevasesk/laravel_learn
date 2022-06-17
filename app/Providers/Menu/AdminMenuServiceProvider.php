<?php

namespace App\Providers\Menu;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AdminMenuServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('admin*', function ($view){
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
                    'icon' => 'mdi-file-image'
                ],
                [
                    'title' => 'Subscribers',
                    'url' => '/admin/subscribers',
                    'icon' => 'mdi-hackernews'
                ],
                [
                    'title' => 'Menus',
                    'url' => '/admin/menu-tree',
                    'icon' => 'mdi-playlist-minus'
                ],
                [
                    'title' => 'Orders',
                    'url' => '/admin/orders',
                    'icon' => 'mdi-spellcheck'
                ],
                [
                    'title' => 'Config',
                    'url' => '/admin/config',
                    'icon' => 'mdi-account-settings-variant'
                ],
                [
                    'title' => 'Homepage Slider',
                    'url' => '/admin/slider',
                    'icon' => 'mdi-format-paint'
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
