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
use Illuminate\Support\Facades\URL;

Route::get('/', function () {

    $users = new \App\Models\User();
    $users = $users->users()->get();

    $u = $users->last();
    $u->notify(new \App\Notifications\TestNotification());

//    \Illuminate\Support\Facades\Notification::send($users, new \App\Notifications\TestNotification());

//    App\Jobs\TestJob::dispatch();
//    Mail::to('test@test.com')->send(new App\Mail\OrderShipped());

//    return URL::signedRoute('unsubscribe', ['user' => 1]);
//    return view('welcome');
    return URL::temporarySignedRoute(
        'mark_as_read', now()->addMinutes(30), ['user' => 1]
    );
});

Route::get('mark_as_read/{user}', 'HomeController@index')->name('mark_as_read');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
