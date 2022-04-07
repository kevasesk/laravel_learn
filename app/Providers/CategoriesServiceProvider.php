<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;

class CategoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $categories = Category::query()->where('id','!=', 1)->select(['id', 'title'])->get();
            $result = [];
            foreach ($categories as $category){
                $result[] = [
                    'id' => $category->id,
                    'title' => $category->title
                ];
            }
            $view->with('product_categories_all', $result);
        });
    }
}
