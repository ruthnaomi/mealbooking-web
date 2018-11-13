<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/meals', 'ApiMealsController');
Route::resource('/cart', 'ApiCartController');
Route::resource('/login', 'ApiLoginController');
Route::resource('/register', 'ApiRegisterController');
Route::resource('/booking', 'ApiBookingController');
Route::post('/callback', function(){
	//
});