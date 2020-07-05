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
    'index','show'
]);;

//Admin用
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {

    //ログインしていない状態
    Route::group(['middleware' => ['guest:admin'], 'namespace' => 'Admin\Auth'], function() {
        Route::get('login', 'LoginController@showLoginForm')->name('login');
    
        Route::get('/', function () {
            return view('welcome');
        });

        Route::post('login', 'LoginController@login')->name('login');

        Route::get('register', 'RegisterController@showRegisterForm')->name('register');
        Route::post('register', 'RegisterController@register')->name('register');

        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');
    });

    //ログインしている状態
    Route::group(['middleware' => ['auth:admin']], function() {

        Route::group(['namespace' => 'Admin\Auth'], function() {
            Route::post('logout', 'LoginController@logout')->name('logout');
        });

        Route::group(['namespace' => 'Admin'], function() {

            Route::get('/', 'HomeController@index')->name('home');
            Route::get('home', 'HomeController@index')->name('home');
            Route::resource('posts', 'PostController')->except([
                'create'
            ]);
            
            Route::post('posts/create', 'PostController@create')->name('posts.create');
        });
    });
});


