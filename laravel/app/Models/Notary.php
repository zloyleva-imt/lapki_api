<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notary extends Model
{
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($item){
            if(!is_string($item['LICENSE'])){
                $item['LICENSE'] = '';
            }
        });
    }
}
