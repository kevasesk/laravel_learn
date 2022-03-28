<?php

namespace App\Providers;

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
                    'url' => null,
                    'children' => [
                        [
                            'title' => 'Camera',
                            'url' => '/category/camera',
                        ],
                        [
                            'title' => 'Laptop',
                            'url' => '/category/laptop',
                        ],
                    ]
                ],
                [
                    'title' => 'Home',
                    'url' => '/',
                ],
                [
                    'title' => 'Contact Us',
                    'url' => '/contact-us',
                ],
                [
                    'title' => 'Blog',
                    'url' => '/blog',
                ],
            ]);
        });
    }
}
