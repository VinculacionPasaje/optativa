<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great! Holaaa
|
*/




        //Para las vistas principales
        Route::get('/', 'FrontendController@index');
        Route::get('pelicula/{id}', 'FrontendController@peliculas');
        Route::get('serie/{id}', 'FrontendController@series');
        Route::get('categorias/{id}', 'FrontendController@category');
         Route::get('chapter/{id}', 'FrontendController@chapters');
        //aqui van todos los url del admin
        Route::group(['middleware' => 'admin'], function () {
            Route::get('administracion','FrontendController@admin');
        });

        Route::get('peliculas', 'FrontendController@todas_peliculas');
        Route::get('series', 'FrontendController@todas_series');



      

        // Authentication Routes...
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Auth\LoginController@login');
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
         Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
          Route::post('register', ['as' => 'register', 'uses' => 'UserController@register'] );
         //Route::post('register', 'Auth\RegisterController@register');


        // Password Reset Routes...
       Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
       Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
       Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
       Route::post('password/reset', 'Auth\ResetPasswordController@reset');

       #perfil y editar perfil
      Route::get('user/perfil', 'HomeUserController@mi_perfil');


Route::get('/home', 'HomeController@index')->name('home');



Route::get('user/perfil/paywithpaypal', array('as' => 'addmoney.paywithpaypal','uses' => 'AddMoneyController@payWithPaypal',));
Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'AddMoneyController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'payment.status','uses' => 'AddMoneyController@getPaymentStatus',));


        //vistas de administracion
        Route::resource('administracion/usuarios','UsuarioController');
