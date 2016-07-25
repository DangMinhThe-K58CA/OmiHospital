<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    //
    protected $table = 'ward';
    public function type() {
        return $this->hasOne('App\Type', 'type_id', 'id');
    }
    public function clinic() {
        return $this->hasMany('App\Clinic', 'ward_id', 'id');
    }
    public function district() {
        return $this->belongsTo('App\District', 'district_id', 'id');
    }
    public function province() {
        return $this->belongsTo('App\Province', 'province_id', 'id');
    }
}
