<?php

namespace App\Routes;

use Illuminate\Support\Facades\Route;

class CrudRoutes
{
    public $crudControllerClass = null;

    public $routeSuffix = '';

    public $routeSuffixName = '';

    public function __construct()
    {
        $this->routes();
    }

    public function routes()
    {
        Route::get($this->routeSuffix, [$this->crudControllerClass, 'index'])->name($this->routeSuffixName.'.list');
        Route::get($this->routeSuffix.'/create', [$this->crudControllerClass, 'create'])->name($this->routeSuffixName.'.create');
        Route::get($this->routeSuffix.'/edit/{id}', [$this->crudControllerClass, 'edit'])->name($this->routeSuffixName.'.edit');
        Route::get($this->routeSuffix.'/destroy/{id}', [$this->crudControllerClass, 'destroy'])->name($this->routeSuffixName.'.destroy');
        Route::post($this->routeSuffix.'/store', [$this->crudControllerClass, 'store'])->name($this->routeSuffixName.'.store');
    }
}
