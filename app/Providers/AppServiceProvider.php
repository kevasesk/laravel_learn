<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Slider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view){
            $logoPath  = \App\Models\Admin\Config::config('global_logo');
            $homeSlider =  Slider::query()->orderBy('position')->get();
            $view->with('logo', $logoPath);
            $view->with('homeSlider', $homeSlider);
        });
    }
}
