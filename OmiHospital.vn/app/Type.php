<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    protected $table = 'type';
    public function ward() {
        return $this->hasMany('App\Ward', 'type_id', 'id');
    }
    public function district() {
        return $this->hasMany('App\District', 'type_id', 'id');
    }
    public function province() {
        return $this->hasMany('App\Province', 'type_id', 'id');
    }
}
