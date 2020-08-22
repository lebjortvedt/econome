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

Route::get('/test', function () {
    return view('test');
});


Route::resource('/vendors', 'VendorController');
Route::resource('/paymentCategories', 'PaymentCategoryController');
Route::resource('/payments', 'PaymentController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
