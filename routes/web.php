<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RecaptchaController;

use App\Http\Controllers\Admin\Blog\PostsController;
use App\Http\Controllers\Admin\Blog\CategoriesController as BlogCategoriesController;

use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\ContactUsController;

use Illuminate\Support\Facades\App;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'index']);

#Admin
Route::get('admin', [AdminController::class, 'index'])->name('admin')->middleware('admin.not.auth');
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard')->middleware('admin.auth');
Route::get('admin/register', [AdminController::class, 'register']);
Route::post('admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('admin/login', [AdminController::class, 'login'])->name('adminLogin');

#Admin Blog
Route::middleware(['admin.auth'])->group(function () {
    #Admin Posts
    $posts = new \App\Routes\Blog\PostsRoutes();
    $posts->routes();

    #Admin Categories
    $categoriesRoutes = new \App\Routes\Blog\CategoriesRoutes();
    $categoriesRoutes->routes();
});

#Admin Pages
Route::middleware(['admin.auth'])->group(function () {
    Route::get('admin/pages', [PagesController::class, 'index'])->name('admin.pages.index');
    Route::get('admin/pages/create', [PagesController::class, 'create'])->name('admin.pages.create');
    Route::get('admin/pages/edit/{id}', [PagesController::class, 'edit'])->name('admin.pages.edit');
    Route::get('admin/pages/destroy/{id}', [PagesController::class, 'destroy'])->name('admin.pages.destroy');
    Route::post('admin/pages/store', [PagesController::class, 'store'])->name('admin.pages.store');
});

#Admin Products
Route::middleware(['admin.auth'])->group(function () {
    Route::get('admin/products', [ProductsController::class, 'index'])->name('admin.products.list');
    Route::get('admin/products/create', [ProductsController::class, 'create'])->name('admin.products.create');
    Route::get('admin/products/edit/{id}', [ProductsController::class, 'edit'])->name('admin.products.edit');
    Route::get('admin/products/destroy/{id}', [ProductsController::class, 'destroy'])->name('admin.products.destroy');
    Route::post('admin/products/store', [ProductsController::class, 'store'])->name('admin.products.store');
});

#Admin Categories
Route::middleware(['admin.auth'])->group(function () {
    Route::get('admin/categories', [CategoriesController::class, 'index'])->name('admin.categories.list');
    Route::get('admin/categories/create', [CategoriesController::class, 'create'])->name('admin.categories.create');
    Route::get('admin/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('admin.categories.edit');
    Route::get('admin/categories/destroy/{id}', [CategoriesController::class, 'destroy'])->name('admin.categories.destroy');
    Route::post('admin/categories/store', [CategoriesController::class, 'store'])->name('admin.categories.store');
});

#RabiitMQ
Route::get('send/text', [\App\Http\Controllers\SendController::class, 'sendText']);

#google recaptcha
Route::get('recaptcha', [RecaptchaController::class, 'index']);
Route::post('recaptcha/sended', [RecaptchaController::class, 'sended'])->name('recaptcha.sended');

#language switcher
Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});

#Blog
Route::get('blog', [BlogController::class, 'index']);

Route::get('contact-us', [ContactUsController::class, 'index']);
Route::get('contact-us/send', [ContactUsController::class, 'send']);

#Cms
Route::get('{url}', [MainController::class, 'show']);
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



