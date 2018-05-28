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

Route::get('/', 'HomeController@index')->name('home');

// Le groupe nous servira plus tard quand on ajoutera d’autres routes.
Route::middleware('admin')->group(function () {
    Route::resource('category', 'CategoryController', [
        'except' => 'show',
    ]);

    Route::name('maintenance.index')->get('maintenance', 'AdminController@index');
    Route::name('maintenance.destroy')->delete('maintenance', 'AdminController@destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('image', 'ImageController', [
        'only' => ['create', 'store', 'destroy'],
    ]);

    Route::resource('profile', 'UserController', [
        'only' => ['edit', 'update'],
        'parameters' => ['profile' => 'user'],
    ]);
});

Route::name('category')->get('category/{slug}', 'ImageController@category');

Route::name('user')->get('user/{user}', 'ImageController@user');
