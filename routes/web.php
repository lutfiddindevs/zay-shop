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



Route::get('/', [App\Http\Controllers\MainController::class, 'index']);
Route::get('/product/{id}/show', [App\Http\Controllers\MainController::class, 'showProduct']);
Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index']);
Route::get('/shop-single', [App\Http\Controllers\ShopController::class, 'buySingle']);

Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});

 Route::resource('user', 'App\Http\Controllers\UserController');
 Route::resource('cart', 'App\Http\Controllers\CartController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'isAdmin'], function() {
    Route::resource('category', 'App\Http\Controllers\CategoryController');
    Route::resource('product', 'App\Http\Controllers\ProductController');
    Route::resource('banner', 'App\Http\Controllers\BannerController');
    Route::get('admin/home', [App\Http\Controllers\AdminController::class, 'index']);
    Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'showUsers']);
    Route::get('/admin/user/create', [App\Http\Controllers\AdminController::class, 'addUser']);
    Route::post('/admin/user/store', [App\Http\Controllers\AdminController::class, 'storeUser']);

});    
