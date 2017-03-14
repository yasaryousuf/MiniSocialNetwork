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

Route::get('/', 'HomeController@index');


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/profile/{username}', 'ProfileController@profile');
Route::get('/profile/{id}/edit', 'ProfileController@edit');
Route::post('/update', 'ProfileController@update');
Route::resource('articles','ArticlesController');