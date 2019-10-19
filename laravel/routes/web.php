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
})->name('welcome');

Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/login', 'Auth\LoginController@loginHandler')->name('loginHandler');
Route::get('/auth/login/{token}', 'Auth\LoginController@authenticate')->name('authenticate');


Route::get('/user', function () {
    return 'You are login';
})->middleware('auth')->name('user');
