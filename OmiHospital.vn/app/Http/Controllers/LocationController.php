<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use converLocation;
use App\Clinic;

class LocationController extends Controller
{
//    public function saveData(Request $request) {
//        $jsonData = '';
//        $clinics = json_decode($jsonData);
//        for ($i = 0; $i < sizeof($clinics); $i ++) {
//            $clinic = $clinics[$i];
//            $new = new Clinic();
//            $new->name = $clinic->Name;
//            $new->location = $clinic->Latitude.','.$clinic->Longitude;
//            $new->phone_number = '1234567890';
//            $new->address = $clinic->Address;
//            $new->ward_id = 169;
//            $new->district_id = 5;
//            $new->province_id = 1;
//            $new->short_description = $clinic->Keywords;
//            $new->save();
//        }
//    }
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
