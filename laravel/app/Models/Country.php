<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name', 'delete_status'];

    public function cities(){
        return $this->hasMany(City::class);
    }

    public function scopeActive($query){
        return $query->whereDeleteStatus(false);
    }
}
