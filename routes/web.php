<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
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

Route::get('/about', [AboutController::class, 'show'])->name('about');

//Users (Public)
Route::get('/users/profile', [UserController::class, 'edit'])->name('users.edit-profile');

//Products (Public)
Route::resource('/products', ProductController::class)->names('products');
Route::post('/products/search', [ProductController::class, 'search'])->name('products.search');

//Categories (Public)
Route::resource('/categories', CategoryController::class)->names('categories');

//Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    //Users (Admin)
    Route::resource('/users', UserController::class)->names('users');
    Route::post('/users/{user}/make-admin', [UserController::class, 'makeAdmin'])->name('users.make-admin');

    //Products (Admin)
    Route::post('/products/{product}/toggle-visibility', [ProductController::class, 'toggleVisibility'])->name('products.toggle-visibility');
});



