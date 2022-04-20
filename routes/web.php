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

use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Admin\ConfigController;

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

Route::get('/', [MainController::class, 'index'])->name('/');

#Admin
Route::get('admin', [AdminController::class, 'index'])->name('admin')->middleware('admin.not.auth');
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard')->middleware('admin.auth');
Route::get('admin/register', [AdminController::class, 'register'])->middleware('admin.auth');
Route::post('admin/create', [AdminController::class, 'create'])->name('admin.create')->middleware('admin.auth');
Route::post('admin/login', [AdminController::class, 'login'])->name('adminLogin');

Route::middleware(['admin.auth'])->group(function () {
    new \App\Routes\Blog\PostsRoutes();
    new \App\Routes\Blog\CategoriesRoutes();
    new \App\Routes\CustomersRoutes();
    new \App\Routes\ImageBlockRoutes();
    new \App\Routes\SubscribersRoutes();
    new \App\Routes\MenuItemsRoutes();
    new \App\Routes\OrdersRoutes();
    new \App\Routes\SliderRoutes();
    new \App\Routes\ProductsRoutes();
    new \App\Routes\CategoriesRoutes();
    new \App\Routes\PagesRoutes();

    Route::get('admin/config', [ConfigController::class, 'config'])->name('admin.config');
    Route::post('admin/config/save', [ConfigController::class, 'save'])->name('admin.config.save');

});

#RabiitMQ
Route::get('send/text', [\App\Http\Controllers\SendController::class, 'sendText']);//TODO remove

#language switcher
Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});//TODO remove

#Blog
Route::get('blog', [BlogController::class, 'index']);

#Contact us
Route::get('contact-us', [ContactUsController::class, 'index'])->name('contact-us');
Route::post('contact-us/send', [ContactUsController::class, 'send']);

#Cart
Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::get('cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('cart/back', [CartController::class, 'back'])->name('cart.back');
Route::get('cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::get('cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('cart/create', [CartController::class, 'create'])->name('cart.create');
Route::get('cart/success', [CartController::class, 'success'])->name('cart.success');

#Customer
Route::get('customer/register', [CustomerController::class, 'register'])->name('customer.register');
Route::get('customer/login', [CustomerController::class, 'login'])->name('customer.login');
Route::get('customer/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard')->middleware('customer.auth');
Route::post('customer/create', [CustomerController::class, 'create'])->name('customer.create');
Route::post('customer/auth', [CustomerController::class, 'auth'])->name('customer.auth');
Route::get('customer/logout', [CustomerController::class, 'logout'])->name('customer.logout')->middleware('customer.auth');

#Subscriber // TODO add recaptcha
Route::post('subscriber/new', [SubscriberController::class, 'new'])->name('subscriber.new');

#Search
Route::get('search', [SearchController::class, 'search'])->name('search');

#Cms
Route::get('{url}', [MainController::class, 'show']);



