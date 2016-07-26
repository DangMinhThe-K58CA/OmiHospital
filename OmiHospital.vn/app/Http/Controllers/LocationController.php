<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use convertLocation;
use Clinic;

class LocationController extends Controller
{
    //
    public function index(Request $request) {
        echo "ok";
    }
    //
    public function getNeighbors($lat, $lng, $zoom) {
//        $clinics = convert(Clinic::find(1)->location);
        $p1 = [
            'lat' => '222.12121',
            'lon' => '1223.111'
        ];
        $p2 = [
            'lat' => '111.333',
            'lon' => '12.1221'
        ];
        $dis = getDistance($p1, $p2);
        var_dump($dis);
    }
}
