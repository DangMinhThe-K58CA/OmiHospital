<?php

namespace app\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use calLocation;
use App\Clinic;

class ApiController extends Controller
{

    public function index(Request $request)
    {
        echo "ok";
    }

    public function getNeighboursLocation($lat, $lng)
    {
        $result= getDistanceFrom2Models(Clinic::find(1),Clinic::find(2));
//        $result = isNeighbour(21.0319495,105.7991852,Clinic::find(1),2000);
//        $result = isNeighbourWith4Params(21.0319495,105.7991852,21.0409818,107.8283453,20);
//        $result = getDistanceWith4Params(21.0319495,105.7991852,21.0409818,105.8283453);
        var_dump($result);
    }
    public function getLocationInformation($id)
    {
        return Clinic::find($id);
    }
}
