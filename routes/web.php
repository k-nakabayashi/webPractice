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

Route::resource('posts', 'PostController')->only([
    'index'
]);;

//ログインしていない状態
Route::group(['prefix' => 'admin', 'middleware' => ['guest:admin']], function() {
    
    Route::get('/', function () {
        return view('admin.welcome');
    });

    Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\Auth\LoginController@login')->name('admin.login');

    Route::get('register', 'Admin\Auth\RegisterController@showRegisterForm')->name('admin.register');
    Route::post('register', 'Admin\Auth\RegisterController@register')->name('admin.register');

    Route::get('password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    
    Route::get('password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('password/reset', 'Admin\Auth\ResetPasswordController@reset')->name('admin.password.update');
});

//ログインしている状態
Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function(){
    Route::get('/', 'Admin\HomeController@index')->name('admin.home');
    Route::get('home', 'Admin\HomeController@index')->name('admin.home');

    Route::post('logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');

    Route::resource('posts', 'PostController')->except([
        'index'
    ]);;
});



