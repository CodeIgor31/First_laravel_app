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

Route::get('/', 'PagesController@main')->name('pages.main');
Route::get('/about', 'PagesController@about')->name('pages.about');
Route::get('/contacts', 'PagesController@contacts')->name('pages.contacts');



Route::get('/posts','PostController@index')->name('post.posts');
Route::get('/posts/create','PostController@create');
Route::get('/posts/update','PostController@update');
Route::get('/posts/delete','PostController@delete');
Route::get('/posts/restore','PostController@revdelete');
Route::get('/posts/first_or_create','PostController@firstOrCreate');
Route::get('/posts/update_or_create','PostController@updateOrCreate');

