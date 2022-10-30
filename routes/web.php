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
Route::get('/users/profile', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}/delete', [UserController::class, 'destroy'])->name('users.destroy');
Route::post('/users/{user}/verify', [UserController::class, 'verifyUser'])->name('users.verify-user');

//Products (Public)
Route::resource('/manga', ProductController::class)->names('products');
Route::post('/manga/search', [ProductController::class, 'search'])->name('products.search');

//Categories (Public)
Route::resource('/categories', CategoryController::class)->names('categories');

Route::middleware(['auth', 'verified'])->group(function () {
});

//Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    //Users (Admin)
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::post('/users/{user}/make-admin', [UserController::class, 'makeAdmin'])->name('users.make-admin');

    //Products (Admin)
    Route::post('/manga/{product}/toggle-visibility', [ProductController::class, 'toggleVisibility'])->name('products.toggle-visibility');
});



