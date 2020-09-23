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

Route::get('hello/{msg?}',function ($msg='no message.') {

$html = <<<EOF
<html>
<head>
<title>Hello</title>
<style>
body {font-size:16pt; color:#999;}
h1 { font-size:100pt; text-align:right; color:#eee;
    margin:-40px 0px -50px 0px; }
</style>
</head>
<body>
    <h1>Hello</h1>
    <p>{$msg}</p>
    <p>これは、サンプルで作ったページです。</p>
</body>
</html>
EOF;

return $html;
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
