<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::group(['prefix' => 'api/v1','namespace' => 'v1'], function()
{
//    Route::get('fakeData', 'ApiController@fakeData');
    Route::get('/', function () {
        return view('pages.index');
    });
    Route::get('/docs','ApiController@index');
    Route::get('/lat={lat}&lng={lng}&rad={rad}','ApiController@getNeighboursLocationByRadius');
    Route::get('/lat={lat}&lng={lng}','ApiController@getNeighboursLocation');
    Route::get('/id={id}','ApiController@getLocationInformation');
    Route::get('/getBookmark/userId={userId}', 'ApiController@getBookmark');
});

Route::group(['prefix' => 'api/v2','namespace' => 'Api'], function()
{

});
