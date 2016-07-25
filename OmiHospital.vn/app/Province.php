<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    //
    protected $table = 'province';
    public function type() {
        return $this->hasOne('App\Type', 'type_id', 'id');
    }
    public function clinic() {
        return $this->hasMany('App\Clinic', 'province_id', 'id');
    }
    public function district() {
        return $this->hasMany('App\District', 'province_id', 'id');
    }
    public function ward() {
        return $this->hasMany('App\Ward', 'province_id', 'id');
    }
}
