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


use App\Category;
use App\Http\Controllers\MediaController;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
Auth::routes();



Route::middleware('auth')
    ->namespace('Admin')
    ->group(function (){
        Route::get('admin','HomeController@index')->name('admin');
        Route::get('getSlug', function (Request $request) {
            $slug = SlugService::createSlug(Category::class, 'slug', \request('slug_name'));
            return $slug;
        });
        Route::prefix('admin')
            ->name('admin.')
            ->group(function (){

                Route::resource('posts','PostController');
                Route::resource('tags','TagController');
                Route::resource('category','CategoryController');
                Route::resource('media','MediaController')->except('update');
                Route::post('/media/{medium}','MediaController@update')->name('media.update');
                Route::get('/pages/{page}/edit','PageController@edit')->name('pages.edit');
                Route::post('/pages/{page}','PageController@update')->name('pages.update');
                Route::get('/profile/{user}/edit','ProfileController@edit')->name('profile.edit');
                Route::post('/profile/{user}','ProfileController@update')->name('profile.update');

                Route::middleware('admin')
                    ->group(function(){
                        Route::resource('users','UserController');
                    });
            });
    });


Route::get('/','PostsController@index');
Route::get('/posts/{post}','PostsController@show')->name('front.show');
Route::get('/{page}','PostsController@page');
Route::post('/contact/sendMessage','PostsController@sendMessage');

Route::get('/google/login','GoogleController@login')->name('google.login');
Route::get('/google/callback','GoogleController@redirect');

Route::get('/facebook/login','FacebookController@login')->name('facebook.login');
Route::get('/facebook/callback','FacebookController@redirect');


Route::get('/social/{type}','SocialController@login')->name('facebook.login');
Route::get('/social/{type}/callback','SocialController@redirect');




