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

Route::middleware(['admin.auth'])->group(function () {
    new \App\Routes\Blog\PostsRoutes();
    new \App\Routes\Blog\CategoriesRoutes();
    new \App\Routes\CustomersRoutes();
    new \App\Routes\ImageBlockRoutes();
    new \App\Routes\SubscribersRoutes();
    new \App\Routes\MenuItemsRoutes();
});

//TODO remake to abstract crud entities

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

#Contact us
Route::get('contact-us', [ContactUsController::class, 'index'])->name('contact-us');
Route::get('contact-us/send', [ContactUsController::class, 'send']);

#Cart
Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::get('cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('cart/back', [CartController::class, 'back'])->name('cart.back');
Route::get('cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('cart/success', [CartController::class, 'success'])->name('cart.success');
Route::get('cart/coupon/add/{id}', [CartController::class, 'couponAdd'])->name('cart.coupon.add');

#Customer
Route::get('customer/register', [CustomerController::class, 'register'])->name('customer.register');
Route::get('customer/login', [CustomerController::class, 'login'])->name('customer.login');
Route::get('customer/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard')->middleware('customer.auth');
Route::post('customer/create', [CustomerController::class, 'create'])->name('customer.create');
Route::post('customer/auth', [CustomerController::class, 'auth'])->name('customer.auth');
Route::get('customer/logout', [CustomerController::class, 'logout'])->name('customer.logout');

#Subscriber // TODO add recaptcha
Route::post('subscriber/new', [SubscriberController::class, 'new'])->name('subscriber.new');

#Search
Route::get('search', [SearchController::class, 'search'])->name('search');



#Cms
Route::get('{url}', [MainController::class, 'show']);



