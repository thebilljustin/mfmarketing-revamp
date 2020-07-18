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

Auth::routes();

Route::resource('/dashboard', 'HomeController');



Route::get('/my-cart', 'StoreController@showCart');

// admin
Route::get('/admin', 'AdminController@index');
Route::resource('/admin/products', 'ProductsController');
Route::resource('/admin/users', 'UsersController');
Route::get('/admin/sales', 'AdminController@sales');

// store
Route::get('/store', 'StoreController@index');
Route::post('/store', 'StoreController@add_to_cart');

// cart
Route::resource('cart', 'CartsController');
// Route::resource('orders', 'OrdersController');

// orders
Route::resource('/orders', 'OrdersController');
