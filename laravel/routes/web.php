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

use Illuminate\Support\Str;

class Msg
{
    public $text;

    public function __construct($text)
    {
        $this->text = $text;
    }
}

Route::get('/', function () {
    return view('welcome');
});

Route::get('testmsg', function (){
    event(new \App\Events\TestMessage(new Msg('new text ' . Str::random(40))));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
