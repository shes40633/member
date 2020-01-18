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

Route::get('/', 'FrontController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::group(['prefix' => 'v1'],  function () {


    Route::post('user/login', 'userController@login');
    Route::get('user/test', 'userController@test');
    // 帳號管理
    Route::get('user', 'userController@index');
    Route::get('user/create', 'userController@create');
    Route::post('user/store', 'userController@store');
    Route::get('user/pwd/change/{id}', 'userController@change');
    Route::post('user/update/{id}', 'userController@update');
    Route::post('user/destroy/{id}', 'userController@destroy');
});
