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
Route::group(['middleware' => 'auth','prefix' => 'admin'], function (){
    Route::resource('user', 'UserController')->middleware('actived');
    Route::get('profile/user', 'UserController@profile')->middleware('actived');
    Route::get('profile/password', 'UserController@password')->middleware('actived');
});
