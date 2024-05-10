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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('index');
// });
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('users.index');
    Route::get('/users', 'UserController@index')->name('users.index');
    Route::post('/users', 'UserController@store')->name('users.store');
    Route::put('/users/{user}', 'UserController@update')->name('users.update');
    Route::put('/users/{user}/disable', 'UserController@disable')->name('users.disable');
    Route::put('/users/{user}/activate', 'UserController@activate')->name('users.activate');
});