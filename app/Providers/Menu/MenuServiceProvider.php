<?php

namespace App\Providers\Menu;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class MenuServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view){
            $view->with('menu', [
                [
                    'title' => 'All categories',
                    'role' => 'categories',
                    'url' => null,
                    'children' => [
                        [
                            'title' => 'Camera',
                            'url' => '/category/camera',
                            'icon' => 'icon-camera'
                        ],
                        [
                            'title' => 'Laptop',
                            'url' => '/category/laptop',
                            'children' => [
                                [
                                    'title' => 'Camera222',
                                    'url' => '/category/camera',
                                    'icon' => 'icon-camera'
                                ],
                                [
                                    'title' => 'Laptop222',
                                    'url' => '/category/laptop',
                                ],
                                [
                                    'title' => 'Laptop2223',
                                    'url' => '/category/laptop',
                                ],
                            ]
                        ],
                    ]
                ],
                [
                    'title' => 'Home',
                    'url' => '/',
                ],
                [
                    'title' => 'About Us',
                    'url' => '/about-us',
                ],
//                [
//                    'title' => 'Pages',
//                    'url' => '/page/list',
//                ],
//                [
//                    'title' => 'Recaptcha',
//                    'url' => '/recaptcha',
//                ],
            ]);
        });
    }
}
