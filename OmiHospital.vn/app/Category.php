<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    protected $table = 'category';
    //
    public function clinic() {
        return $this->belongsToMany('App\Clinic', 'clinic_category', 'clinic_id', 'category_id');
    }
}
