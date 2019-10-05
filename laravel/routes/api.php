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

Route::group([
    'middleware' => 'api',
    'namespace' => 'API'
], function ($router) {

    Route::group(['prefix' => 'auth',], function ($router) {
        Route::post('login', 'AuthController@login');
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');
    });

    Route::group(['namespace' => 'Admin','prefix' => 'admin',], function ($router) {
        Route::resource('users', 'UserController');
        Route::resource('cities', 'CityController');
        Route::resource('countries', 'CountryController');
    });

});

Route::fallback(function (){
    return response()->json(['message' => 'Not found.'],404);
});