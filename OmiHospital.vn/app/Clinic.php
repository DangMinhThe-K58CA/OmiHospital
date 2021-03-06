<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    //
    protected $table = 'clinic';
    public function category() {
        return $this->belongsToMany('App\Category', 'clinic_category', 'clinic_id','category_id');
    }
    public function district() {
        return $this->belongsTo('App\District', 'district_id', 'id');
    }
    public function ward() {
        return $this->belongsTo('App\Ward', 'ward_id', 'id');
    }
    public function province() {
        return $this->belongsTo('App\Province', 'province_id', 'id');
    }
}
