<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //
    protected $table = 'district';
    public function type() {
        return $this->hasOne('App\Type', 'type_id', 'id');
    }
    public function province() {
        return $this->belongsTo('App\Province', 'province_id', 'id');
    }
    public function  ward() {
        return $this->hasMany('App\Ward', 'district_id', 'id');
    }
    public function clinic() {
        return $this->hasMany('App\Clinic', 'district_id', 'id');
    }
}
