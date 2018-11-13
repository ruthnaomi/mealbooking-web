<?php

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

Route::resource('/reports', 'ReportController');
Route::resource('/meals', 'MealsController');
Route::resource('/bookings', 'BookingController');
Route::resource('/print', 'PrintController');
Route::resource('/register', 'RegisterController');
Route::resource('/cart', 'CartController');
Route::resource('/payment', 'PaymentController');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/super', function (){
    return view('super');
})->name('super');
