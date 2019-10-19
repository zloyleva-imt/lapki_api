<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class LoginToken extends Model
{

    protected $fillable = ['user_id', 'token'];

    public function getRouteKeyName()
    {
        return 'token';
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function generateToken(User $user)
    {
        return static::updateOrCreate(
            ['user_id' => $user->id,],
            [ 'token' => Str::random(50),]
        );
    }

    public function send()
    {
        $url = route('authenticate', ['token' => $this->token]);
        Mail::raw(
            $url,
            function ($message){
                $message->to($this->user->email)
                    ->subject('Login to site');
            }
        );
    }
}
