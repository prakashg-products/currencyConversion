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

Route::group(['namespace' => 'API'], function () {
    Route::post('/jwt/token', 'JWTController@generateToken');
    Route::post('/jwt/token/refresh', 'JWTController@refreshToken')->middleware('jwt.refresh');
    Route::get('/jwt/token', 'JWTController@getToken')->middleware('auth');

    Route::get('/currencies', 'CurrenciesController@index');
    Route::delete('/currencies/reset', 'CurrenciesController@reset');
    Route::post('/currencies', 'CurrenciesController@store');
    Route::post('/convert', 'ConverterController@convert');
});
