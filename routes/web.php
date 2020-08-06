<?php

use Illuminate\Support\Facades\Route;

//route for admin
Route::get('/','dashboardController@index')->name('dash')->middleware('auth:admin');

    Route::prefix('admin')->group(function(){

    Route::middleware('auth:admin')->group(function(){

    Route::resource('/products','ProductController');

    Route::resource('/orders','OrderController');

    Route::resource('/users','userController');

    Route::get('/confirm/{id}','OrderController@confirm')->name('order.confirm');

    Route::get('/pending/{id}','OrderController@pending')->name('order.pending');
    
    Route::get('/logout','AdminUserController@logout')->name('admin.logout');

    });

    Route::get('/login','AdminUserController@index')->name('admin.login');

    Route::post('/login','AdminUserController@store')->name('admin.store');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
