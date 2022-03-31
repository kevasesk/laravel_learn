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
Route::get('/admin/posts', [PagesController::class, 'index']);


#Cms
Route::get('/{url}', [PageController::class, 'show']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
