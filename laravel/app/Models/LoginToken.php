<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LoginToken extends Model
{

    protected $fillable = ['user_id', 'token'];

    public static function generateToken(User $user)
    {
        return static::create([
            'user_id' => $user->id,
            'token' => Str::random(50),
        ]);
    }
}
