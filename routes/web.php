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
     'namespace' => 'Users', 
     'as' => 'site.login', 
     'middleware' =>'checklogin'], function () {
     Route::get('/', 'LoginController@index');
     Route::post('/', 'LoginController@login');
 });

 Route::group([
     'prefix' => 'admin', 
     'namespace' => 'Admin', 
     'as' => 'admin.',
     'middleware' =>'checklogout'], function () {
    Route::get('/', 'AdminController@index')->name('dashboard');
 });