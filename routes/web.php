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

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    // Dashboard
    Route::get('/', 'HomeController@index');
    Route::get('/home','HomeController@index');

    // Products
    Route::get('/products','ProductsController@index');

    // Ingredients
    Route::get('/ingredient_dashboard','IngredientsController@ingredient_dashboard');

    // Available Ingredients
    Route::get('/available','IngredientsController@available_ingredient');

    // Inbound Ingredients
    Route::get('/inbound','IngredientsController@inbound_ingredient');

    // Outbound Ingredients
    Route::get('/outbound','IngredientsController@outbound_ingredient');

    // Reserved Ingredients
    Route::get('/reserved','IngredientsController@reserved_ingredient');
    // Ingredients Profile
    Route::get('/profile','IngredientsController@ingredient_profile');

    // Orders
    Route::get('/order_dashboard','OrdersController@order_dashboard');

    // New Orders
    Route::get('/new_orders','OrdersController@new_order');
    // Book Orders
    Route::get('/booked_orders','OrdersController@booked_orders');
    // New Stock
    Route::get('/new_stock','OrdersController@new_stock');
    // Company
    Route::get('/companies','CompanyController@index');
    Route::post('/new_company','CompanyController@store');
    Route::post('edit_company/{id}', 'CompanyController@update');
    Route::post('deactivate_company/{id}', 'CompanyController@deactivate');
    Route::post('activate_company/{id}', 'CompanyController@activate');
    // Role
    Route::get('/roles','RoleController@index');
    Route::post('/new_role','RoleController@store');
    Route::post('edit_role/{id}', 'RoleController@update');
    Route::post('deactivate_role/{id}', 'RoleController@deactivate');
    Route::post('activate_role/{id}', 'RoleController@activate');

    # User
    Route::get('/users','UserController@index');
    Route::post('add-user', 'UserController@store');
    Route::post('update-user/{id}', 'UserController@update');
    Route::post('deactivate-user/{id}', 'UserController@deactivate');
    Route::post('activate-user/{id}', 'UserController@activate');
});

