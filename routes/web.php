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

use App\Http\Middleware\HelloMiddleware;

Route::get('hello', 'HelloController@index');
Route::post('hello', 'HelloController@post');

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostController');

Route::resource('comments', 'CommentController');

Route::get('login/twitter', 'Auth\LoginController@redirectToProvider')->name('login.twitter');
Route::get('login/twitter/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('posts/{post}/favorites', 'FavoriteController@store');
Route::get('posts/{post}/unfavorites', 'FavoriteController@destroy');

Route::get('search', 'SearchController@index')->name('search');
Route::get('autocomplete', 'SearchController@autocomplete')->name('autocomplete');

Route::get('posts/{post}/countfavorites', 'FavoriteController@count');

Route::get('posts/{post}/hasfavorites', 'FavoriteController@hasfavorite');

Route::group(['middleware' => 'auth'], function() {
    // 前回追加したルーティングなどは省略しています

    // 今回追加したルーティング
    Route::group(['prefix' => 'users'], function() {
        Route::get('edit/{id}', 'UsersController@getEdit')->name('users.edit');
        Route::post('edit/{id}', 'UsersController@postEdit')->name('users.postEdit');
        Route::post('edit/{id}', 'UsersController@postEdit')->name('users.postEdit');
    });

});

Route::get('hello/add', 'HelloController@add');
Route::post('hello/add', 'HelloController@create');

Route::get('hello/edit', 'HelloController@edit');
Route::post('hello/edit', 'HelloController@update');

Route::get('hello/del', 'HelloController@del');
Route::post('hello/del', 'HelloController@remove');

Route::get('hello/show', 'HelloController@show');

Route::get('person', 'PersonController@index');

Route::get('person/find', 'PersonController@find');
Route::post('person/find', 'PersonController@search');

Route::get('person/add', 'PersonController@add');
Route::post('person/add', 'PersonController@create');

Route::get('person/edit', 'PersonController@edit');
Route::post('person/edit', 'PersonController@update');

Route::get('person/del', 'PersonController@delete');
Route::post('person/del', 'PersonController@remove');

Route::get('board', 'BoardController@index');

Route::get('board/add', 'BoardController@add');
Route::post('board/add', 'BoardController@create');

Route::resource('rest', 'RestappController');

Route::get('hello/rest', 'HelloController@rest');
