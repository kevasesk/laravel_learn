<?php

namespace App\Providers\Menu;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\MenuItem;

class MenuServiceProvider extends ServiceProvider
{
    const MAIN_MENU_ID = 1;

    const CATEGORIES_ID = 2;

    const HELP_MENU_ID = 5;

    const USEFULL_MENU_ID = 8;

    public function boot()
    {
        View::composer('*', function ($view){
            $mainMenu = MenuItem::query()->where('parent_id', '=', self::MAIN_MENU_ID)->get()->toArray();
            $categories = MenuItem::query()->where('parent_id', '=', self::CATEGORIES_ID)->get()->toArray();
            $helpMenu = MenuItem::query()->where('parent_id', '=', self::HELP_MENU_ID)->get()->toArray();
            $usefullMenu = MenuItem::query()->where('parent_id', '=', self::USEFULL_MENU_ID)->get()->toArray();

            $view->with('menu', $mainMenu);
            $view->with('categoriesMenu', $categories);
            $view->with('helpMenu', $helpMenu);
            $view->with('usefullMenu', $usefullMenu);
        });
    }
}
