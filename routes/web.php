<?php

use Illuminate\Support\Facades\Route;
$namespace = 'App\\Http\\Controllers\\';

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', $namespace.'Auth\LoginController@showLogin');
Route::post('login_post', $namespace.'Auth\LoginController@login_post');
Route::get('register', $namespace.'Auth\RegisterController@showRegister');
Route::post('register_post', $namespace.'Auth\RegisterController@register_post');

Route::group(['middleware' => 'auth'], function () use ($namespace){
    Route::get('home', $namespace.'HomeController@home')->name('home');
    Route::get('logout', $namespace.'Auth\LoginController@logout');
    Route::post('storeComment', $namespace.'ArticleController@storeComment');
    Route::get('articles/{id}', $namespace.'ArticleController@show');

    Route::group(['middleware' => 'checkpermission'], function () use ($namespace){
        Route::resource('users', $namespace.'UserController');
        Route::resource('roles', $namespace.'RoleController');
        Route::resource('articles', $namespace.'ArticleController');
        Route::get('articles/delete/{id}', $namespace.'ArticleController@delete')->name('articles.delete');
    });
});
