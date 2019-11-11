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


use App\Http\Controllers\MediaController;

Auth::routes();

Route::get('/', 'PostController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('posts','PostController');
Route::resource('tags','TagController');
Route::resource('category','CategoryController');
Route::resource('media','MediaController')->except('update');
Route::post('/media/{medium}','MediaController@update');
//Route::post('test','MediaController@update');
