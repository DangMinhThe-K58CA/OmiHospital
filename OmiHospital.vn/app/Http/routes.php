<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/saveData', 'LocationController@saveData');


Route::group(['prefix' => 'locationService'], function () {
    Route::get('/', 'LocationController@index');
    Route::get('/s={lat}&e={lng}&z={zoom}', 'LocationController@getNeighbors');
});
