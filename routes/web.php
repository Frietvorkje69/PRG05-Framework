<?php

use App\Http\Controllers\AboutmeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'show'])->name('home');
Route::get('/home', [HomeController::class, 'show'])->name('home');

Auth::routes();

Route::get('/about', [AboutmeController::class, 'show'])->name('about');
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/users', [UserController::class, 'index'])->name('users');

## Create
Route::get('/products/create', [App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');

## Update
Route::get('/products/store/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
Route::post('/products/update/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('products.update');

## Delete
Route::get('/products/delete', [App\Http\Controllers\ProductController::class, 'delete'])->name('products.delete');


