<?php

use App\Http\Controllers\AdminController;
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



Route::get('/posts','PostController@index')->name('post.index');
Route::get('/posts/create','PostController@create')->name('post.create');
Route::post('/posts', 'PostController@store')->name('post.store');
Route::get('/posts/{post}', 'PostController@show')->name('post.show');
Route::get('/posts/{post}/edit', 'PostController@edit')->name('post.edit');
Route::patch('/posts/{post}', 'PostController@update')->name('post.update');
Route::delete('/posts/{post}', 'PostController@destroy')->name('post.destroy');

Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::get('/admin/create', 'AdminController@create')->name('admin.post.create');
Route::post('/admin', 'AdminController@store')->name('admin.post.store');
Route::get('/admin/{post}', 'AdminController@show')->name('admin.post.show');
Route::get('/admin/{post}/edit', 'AdminController@edit')->name('admin.post.edit');
Route::patch('/admin/{post}', 'AdminController@update')->name('admin.post.update');
Route::delete('/admin/{post}', 'AdminController@destroy')->name('admin.post.destroy');

Route::get('/posts/delete','PostController@delete');
Route::get('/posts/restore','PostController@revdelete');
Route::get('/posts/first_or_create','PostController@firstOrCreate');
Route::get('/posts/update_or_create','PostController@updateOrCreate');

