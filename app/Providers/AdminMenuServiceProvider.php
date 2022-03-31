<?php

namespace App\Providers;

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
                ],
                [
                    'title' => 'Pages',
                    'url' => 'pages',
                ],
            ]);
        });
    }
}
