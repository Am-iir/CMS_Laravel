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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Auth::routes();

//Route::get('/', 'PostController@index');
//Route::get('/home', 'HomeController@index')->name('home');
//Route::resource('posts','PostController');
//Route::resource('tags','TagController');
//Route::resource('category','CategoryController');
//Route::resource('media','MediaController')->except('update');
//Route::post('/media/{medium}','MediaController@update');

Route::redirect('/', 'admin');

Route::middleware('auth')
    ->namespace('Admin')
    ->group(function (){
        Route::get('admin','HomeController@index')->name('admin');
        Route::prefix('admin')
            ->name('admin.')
            ->group(function (){
                Route::resource('posts','PostController');
                Route::resource('tags','TagController');
                Route::resource('category','CategoryController');
                Route::resource('media','MediaController')->except('update');
                Route::post('/media/{medium}','MediaController@update');
            });
    });

