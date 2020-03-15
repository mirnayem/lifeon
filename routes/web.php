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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('users', 'User\UserController');
Route::resource('posts', 'Post\PostController');
Route::resource('categories', 'Category\CategoryController');
Route::resource('tags', 'Tag\TagController');
Route::resource('comments', 'Comment\CommentController');
