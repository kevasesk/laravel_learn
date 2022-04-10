<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Customer;

class CustomerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            $request = app(\Illuminate\Http\Request::class);
            $currentCustomerId = $request->session()->get('customer_id');
            if($currentCustomerId){
                $customer = Customer::query()->find($currentCustomerId);
                $view->with('customer', $customer);
            }
        });
    }
}
