<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RecaptchaController;

use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\ProductsController;

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

Route::get('/', [PageController::class, 'index']);
Route::get('pages/generate', [PageController::class, 'generate']);

#Admin
Route::get('admin', [AdminController::class, 'index'])->name('admin')->middleware('admin.not.auth');
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard')->middleware('admin.auth');
Route::get('admin/register', [AdminController::class, 'register']);
Route::post('admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('admin/login', [AdminController::class, 'login'])->name('adminLogin');

#Admin Posts
Route::middleware(['admin.auth'])->group(function () {
    Route::get('admin/posts', [PostsController::class, 'index'])->name('admin.posts.index');
    Route::get('admin/posts/create', [PostsController::class, 'create'])->name('admin.posts.create');
    Route::get('admin/posts/edit/{id}', [PostsController::class, 'edit'])->name('admin.posts.edit');
    Route::get('admin/posts/destroy/{id}', [PostsController::class, 'destroy'])->name('admin.posts.destroy');
    Route::post('admin/posts/store', [PostsController::class, 'store'])->name('admin.posts.store');
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

#RabiitMQ
Route::get('send/text', [\App\Http\Controllers\SendController::class, 'sendText']);

#google recaptcha
Route::get('recaptcha', [RecaptchaController::class, 'index']);
Route::post('recaptcha/sended', [RecaptchaController::class, 'sended'])->name('recaptcha.sended');

#Cms
Route::get('{url}', [PageController::class, 'show']);
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

#language switcher
Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});

