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

Route::group([ 'prefix' => 'auth' ], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
  
    Route::group([ 'middleware' => 'auth:api' ], function() {
        Route::put('update-profile', 'Api\ProfileController@update');

        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

Route::group([ 'middleware' => 'auth:api' ], function() {
    Route::post('create-family', 'Api\Family\FamilyController@store');
    Route::delete('delete-family/{id}', 'Api\Family\FamilyController@destroy');

    Route::post('add-child', 'Api\Family\ChildController@store');
    Route::delete('delete-child/{id}', 'Api\Family\ChildController@destroy');
    Route::get('list-child', 'Api\Family\ChildController@index');

    Route::post('add-parent', 'Api\Family\ParentController@store');
    Route::delete('delete-parent/{id}', 'Api\Family\ParentController@destroy');
    Route::get('list-parent', 'Api\Family\ParentController@index');
    
    Route::post('add-event', 'Api\EventController@store');
    Route::put('update-event/{id}', 'Api\EventController@update');
    Route::delete('delete-event/{id}', 'Api\EventController@destroy');
    Route::get('list-event', 'Api\EventController@index');

    Route::post('create-chat', 'Api\ChatController@store');
    Route::get('list-chat', 'Api\ChatController@index');
});