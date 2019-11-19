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



Route::redirect('/admin', 'admin');
Route::get('/','PostsController@index');
Route::get('/posts/{post}','PostsController@show')->name('front.show');



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
            });
    });

