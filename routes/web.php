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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user', 'UserController@index')->name('user');
Route::get('/user/{id}', 'UserController@show')->name('user.show');
Route::get('/create', 'UserController@create');
Route::post('/user/create', 'UserController@store');
Route::get('/user/edit/{id}','UserController@edit')->name('user.edit');
Route::post('/user/update','UserController@update');
Route::get('/user/delete/{id}', 'UserController@destroy');

