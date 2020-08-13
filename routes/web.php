<?php

use Illuminate\Support\Facades\Route;

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

Route::get('home', 'HomeController@index');

Route::get('profil', 'AdminController@index');

Route::get('profil/create', 'AdminController@create');

Route::get('profil/{profil}', 'AdminController@show');

Route::post('profil', 'AdminController@store');

Route::get('profil/{profil}/edit', 'AdminController@edit');

Route::patch('profil/{profil}', 'AdminController@update');

Route::delete('profil/{profil}', 'AdminController@destroy'); 

