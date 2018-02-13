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
Auth::routes();

Route::group(['namespace' => 'Web', 'middleware' => ['auth']], function () {
    Route::get('/', 'ConverterController@index')->name('converter');
    Route::get('/converter', 'ConverterController@index')->name('converter');
    Route::get('/manage', 'ManageController@index')->name('manage');
});
