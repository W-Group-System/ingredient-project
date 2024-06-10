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

    Route::resource('roles', 'RoleController');
    Route::get('/roles', 'RoleController@index');
    Route::get('/roles', 'RoleController@index')->name('setup.roles');

    Route::resource('booked_orders', 'BookedOrderController');
    Route::get('/booked_orders', 'BookedOrderController@index');
    Route::get('/booked_orders', 'BookedOrderController@index')->name('booked_order.booked_order_type');

    Route::resource('inventory', 'InventoryController');
    Route::get('/inventory', 'InventoryController@index');
    Route::get('/inventory', 'InventoryController@index')->name('inventory.inventory');
    Route::get('create-inventory', 'InventoryController@create')->name('inventory.inventory-create');
    Route::post('create-inventory', 'InventoryController@ingredientStore')->name('inventory.ingredientStore');
    Route::post('create-incoming-inventory', 'InventoryController@incomingIngredientStore')->name('inventory.incomingIngredientStore');


    Route::resource('product_percentages', 'ProductPercentageController');
    Route::get('/product_percentage', 'ProductPercentageController@index')->name('product_percentage.product_percentage');
    Route::get('create-product-percentage', 'ProductPercentageController@create')->name('product_percentage.product_percentage-create');

    Route::resource('product_name', 'ProductNameController');
    Route::get('/product_name', 'ProductNameController@index')->name('product_name.product_name');
    Route::get('product_name/create', 'ProductNameController@create')->name('product_name.create');


    Route::get('/ingredients-allocation', 'IngredientInventoryController@index');
    Route::get('/ingredients-allocation', 'IngredientInventoryController@index')->name('inventory.ingredients-inventory');


});

