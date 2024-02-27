<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/orders', 'App\Http\Controllers\OrdersController@index')->name("orders.index");
Route::get('/orders/create', 'App\Http\Controllers\OrdersController@create')->name("orders.create");
Route::post('/orders/save', 'App\Http\Controllers\OrdersController@save')->name("orders.save");
Route::get('/orders/{id}', 'App\Http\Controllers\OrdersController@show')->name("orders.show");
Route::delete('/orders/{id}', 'App\Http\Controllers\OrdersController@delete')->name("orders.delete");


