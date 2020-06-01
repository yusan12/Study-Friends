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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostController');

Route::resource('comments', 'CommentController');

Route::get('login/twitter', 'Auth\LoginController@redirectToProvider')->name('login.twitter');
Route::get('login/twitter/callback', 'Auth\LoginController@handleProviderCallback');

// Route::get('view/if', 'ViewController@if');
// Route::get('view/escape', 'ViewController@escape');
