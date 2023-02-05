<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/main', 'PagesController@main')->name('pages.main');
Route::get('/about', 'PagesController@about')->name('pages.about');
Route::get('/contacts', 'PagesController@contacts')->name('pages.contacts');



Route::get('/posts','PostController@index')->name('post.index');
Route::get('/posts/create','PostController@create')->name('post.create');
Route::post('/posts', 'PostController@store')->name('post.store');
Route::get('/posts/{post}', 'PostController@show')->name('post.show');
Route::get('/posts/{post}/edit', 'PostController@edit')->name('post.edit');
Route::patch('/posts/{post}', 'PostController@update')->name('post.update');
Route::delete('/posts/{post}', 'PostController@destroy')->name('post.destroy');

Route::get('/admin', 'AdminController@index')->middleware('admin')->name('admin.index');
Route::get('/admin/create', 'AdminController@create')->middleware('admin')->name('admin.post.create');
Route::post('/admin', 'AdminController@store')->middleware('admin')->name('admin.post.store');
Route::get('/admin/{post}', 'AdminController@show')->middleware('admin')->name('admin.post.show');
Route::get('/admin/{post}/edit', 'AdminController@edit')->middleware('admin')->name('admin.post.edit');
Route::patch('/admin/{post}', 'AdminController@update')->middleware('admin')->name('admin.post.update');
Route::delete('/admin/{post}', 'AdminController@destroy')->middleware('admin')->name('admin.post.destroy');

Route::get('/posts/delete','PostController@delete');
Route::get('/posts/restore','PostController@revdelete');
Route::get('/posts/first_or_create','PostController@firstOrCreate');
Route::get('/posts/update_or_create','PostController@updateOrCreate');

require __DIR__.'/auth.php';
