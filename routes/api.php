<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::group(['prefix' => 'system', 'middleware' => ['client'], 'namespace' => 'Api\Client'], function() {

});


    Route::group(['prefix' => 'auth', 'namespace' => 'Api\Mobile'], function () {


        Route::post('login', 'AUTH\AuthController@login');
        Route::post('register', 'AUTH\AuthController@Register');
        Route::post('otp-verify', 'AUTH\AuthController@otpVerify');


        Route::group(['middleware' => 'auth:vendor'], function(){
            Route::post('get-number', 'AppController@getNumbers');
        });

    });
