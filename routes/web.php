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


/**
 * Route Login
 */

 Route::group([
     'prefix' => 'login', 
     'namespace' => 'AuthNew', 
     'as' => 'site.login', 
     'middleware' =>'checklogin'], function () {
     Route::get('/', 'LoginController@index');
     Route::post('/', 'LoginController@login');
 });

 Route::group([
     'prefix' => 'admin',
     'as' => 'admin.',
     'namespace' => 'Admin',
     'middleware' =>'checklogout'], function () {
         
    Route::get('/', 'AdminController@index')
        ->name('dashboard');

    Route::group([
        'prefix' => 'users',
        'as' => 'user.'
    ], function () {
        Route::get('', 'UserController@index')->name('index');
        Route::get('{id}/edit', 'UserController@edit')->name('edit');
        Route::post('{id}/edit', 'UserController@update');
        Route::get('add', 'UserController@create')->name('add');
        Route::post('add', 'UserController@store');
        Route::get('{id}/delete', 'UserController@destroy')->name('delete');
    });

    Route::group([
        'prefix' => 'categories',
        'as' => 'cate.'
    ], function () {
        Route::get('', 'CategoryController@index')->name('index');
        Route::get('{id}/edit', 'CategoryController@edit')->name('edit');
        Route::post('{id}/edit', 'CategoryController@update');
        Route::get('add', 'CategoryController@create')->name('add');
        Route::post('add', 'CategoryController@store');
        Route::get('{id}/delete', 'CategoryController@destroy')->name('delete');
    });

    Route::group([
        'prefix' => 'products',
        'as' => 'product.'
    ], function () {
        Route::get('', 'ProductController@index')->name('index');
        Route::get('{id}/edit', 'ProductController@edit')->name('edit');
        Route::post('{id}/edit', 'ProductController@update');
        Route::get('add', 'ProductController@create')->name('add');
        Route::post('add', 'ProductController@store');
        Route::get('{id}/delete', 'ProductController@destroy')->name('delete');
    });
 });

 Route::get('logout', 'AuthNew\LoginController@logout')
        ->middleware('checklogout')
        ->name('site.logout');
// MediaManager
ctf0\MediaManager\MediaRoutes::routes();