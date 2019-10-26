<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    static function byEmail(string $email){
        return static::where('email', $email)->firstOrFail();
    }

    public function isOwnAds(Ad $ad){
        return $this->id === $ad->user_id;
    }
}
