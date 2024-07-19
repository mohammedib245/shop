<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductColorController;
use App\Http\Controllers\ProductSizeController;
use App\Http\Controllers\ProductColorsizeController;
use App\Http\Controllers\ProductImageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard.index');
})->name('dashboard');

// users
Route::resource('users', UserController::class);

Route::resource('categories', CategoryController::class);

Route::resource('products', ProductController::class);

Route::resource('colors', ProductColorController::class);


// Route::resource('colors', ProductSizeController::class);
// Route::resource('colors', ProductColorsizeController::class);
// Route::resource('colors', ProductImageController::class);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
