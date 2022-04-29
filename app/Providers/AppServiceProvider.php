<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Http\Request;
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
            $settings = \App\Models\Admin\Config::all()->toArray();
            $settingsMap = [];
            foreach ($settings as $setting){
                $settingsMap[$setting['key']] = $setting['value'];
            }
            $homeSlider =  Slider::query()->orderBy('position')->get();

            $shippings = [
                'nova-pochta' => [
                    'title' => 'Новая почта',
                    'cost' => 100
                ],
                'pochta' => [
                    'title' => 'Почта',
                    'cost' => 200
                ],
            ];
            $payments = [
                'paypal' => [
                    'title' => 'PayPal',
                ],
                'cash' => [
                    'title' => 'Cash',
                ],
            ];
            $view->with('settings', $settingsMap);
            $view->with('homeSlider', $homeSlider);
            $view->with('shippings', $shippings);
            $view->with('payments', $payments);
            $view->with('globalCart', \App\Helpers\Cart::getCurrentCart());
            $view->with('currency', '₴');
        });
    }
}
