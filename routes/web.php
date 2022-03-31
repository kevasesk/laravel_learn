<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\PagesController;

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
Route::get('/pages/generate', [PageController::class, 'generate']);

#Admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('admin.not.auth');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard')->middleware('admin.auth');
Route::get('/admin/register', [AdminController::class, 'register']);
Route::post('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin/login', [AdminController::class, 'login'])->name('adminLogin');

#Admin Posts
Route::get('/admin/posts', [PagesController::class, 'index'])->name('admin.posts.index');
Route::get('/admin/posts/create', [PagesController::class, 'create'])->name('admin.posts.create');
Route::post('/admin/posts/edit', [PagesController::class, 'edit'])->name('admin.posts.edit');
Route::post('/admin/posts/destroy', [PagesController::class, 'destroy'])->name('admin.posts.destroy');
Route::post('/admin/posts/store', [PagesController::class, 'store'])->name('admin.posts.store');

Route::get('/admin/posts/send', [PagesController::class, 'send'])->name('admin.posts.send');


#Cms
Route::get('/{url}', [PageController::class, 'show']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
