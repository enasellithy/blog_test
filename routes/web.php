<?php

use Illuminate\Support\Facades\Route;
$namespace = 'App\\Http\\Controllers\\';

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', $namespace.'Auth\LoginController@showLogin');
Route::post('login_post', $namespace.'Auth\LoginController@login_post');

Route::group(['middleware' => 'auth'], function () use ($namespace){
    Route::get('home', $namespace.'HomeController@home')->name('home');
    Route::get('logout', $namespace.'Auth\LoginController@logout');

    Route::group(['middleware' => 'checkpermission'], function () use ($namespace){
        Route::resource('users', $namespace.'UserController');
    });
});
