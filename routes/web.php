<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('food', 'FoodController');
Auth::routes();
    
Route::resource('category', 'CategoryController');
Auth::routes();

// Route::get('/food', [App\Http\Controllers\FoodController::class, 'food'])->name('food.index');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/customers', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer');
Route::resource('customer', 'CustomerController');
Auth::routes();

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class,'index'])->name('home');

