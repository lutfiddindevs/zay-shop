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



Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index']);
Route::resource('category', 'App\Http\Controllers\CategoryController');
Route::resource('product', 'App\Http\Controllers\ProductController');
Route::resource('banner', 'App\Http\Controllers\BannerController');
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
