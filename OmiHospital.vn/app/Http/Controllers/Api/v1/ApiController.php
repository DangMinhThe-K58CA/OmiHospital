<?php

namespace app\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use calLocation;
use App\Clinic;
use Response;
use Illuminate\Database\QueryException;
use App\Clinic_category;
use App\Bookmark;

class ApiController extends Controller
{
//    public function fakeData() {
//        $clinics = Clinic::all();
//        foreach ($clinics as $cli) {
//            $cliId = $cli->id;
//            $cateId = ($cli->id % 6);
//            $cateId = $cateId + 1;
//            $cli_cate =new Clinic_category();
//            $cli_cate->clinic_id = $cliId;
//            $cli_cate->category_id = $cateId;
//            $cli_cate->save();
//        }
//    }
    public function getBookmark($userId) {
        $result = [
            'status' => "",
            'message' => "",
            'data' => ""
        ];
        try {
            $data = array();
            $bookmarks = Bookmark::where('user_id', '=', $userId)->get();
            foreach ($bookmarks as $bm) {
                $cates = Clinic::find($bm->clinic_id)->category()->get();
                foreach ($cates as $cate) {
                    array_push($data, $cate);
                }
            }

            $result['status'] = 200;
            $result['message'] = "ok success";
            $result['data'] = $data;
        }
        catch ( QueryException $ex) {
            $result['status'] = $ex->getCode();
            $result['message'] = $ex->errorInfo;
        }

        //$result= getDistanceFrom2Models(Clinic::find(3),Clinic::find(50));
//        $result = isNeighbour(21.0319495,105.7991852,Clinic::find(1),2000);
//        $result = isNeighbourWith4Params(21.0319495,105.7991852,21.0409818,107.8283453,20);
//        $result = getDistanceWith4Params(21.0319495,105.7991852,21.0409818,105.8283453);
        $headers = [
            'Content-type'=> 'application/json; charset=utf-8',
            'Message' =>  $result['message']
        ];
        //echo $result['data'][0]['address'];
        return Response::json($result, $result['status'], $headers, JSON_UNESCAPED_UNICODE);
    }
    public function index(Request $request)
    {
        echo "ok";
    }
    public function getNeighboursLocationByRadius($lat, $lng, $rad)
    {
        $result = [
            'status' => "",
            'message' => "",
            'data' => ""
        ];
        try {
            $clinics = Clinic::all();
            $data = array();
            foreach ($clinics as $cli) {
                if (isNeighbour($lat, $lng, $cli, $rad)) {
                    $location = [
                        'id' => $cli->id,
                        'name' => $cli->name,
                        'address' => $cli->address,
                        'short_description' => $cli->short_description,
                        'ward_id' => $cli->ward_id,
//                    'district_id' => $cli->district_id,
//                    'province_id' => $cli->province_id,
                        'lat' => getLat($cli->location),
                        'lng' => getLng($cli->location)
                    ];
                    array_push($data, $location);
                }
            }
            $result['status'] = 200;
            $result['message'] = "ok success";
            $result['data'] = $data;
        }
        catch ( QueryException $ex) {
            $result['status'] = $ex->getCode();
            $result['message'] = $ex->errorInfo;
        }

        //$result= getDistanceFrom2Models(Clinic::find(3),Clinic::find(50));
//        $result = isNeighbour(21.0319495,105.7991852,Clinic::find(1),2000);
//        $result = isNeighbourWith4Params(21.0319495,105.7991852,21.0409818,107.8283453,20);
//        $result = getDistanceWith4Params(21.0319495,105.7991852,21.0409818,105.8283453);
        $headers = [
            'Content-type'=> 'application/json; charset=utf-8',
            'Message' =>  $result['message']
        ];
        //echo $result['data'][0]['address'];
        return Response::json($result, $result['status'], $headers, JSON_UNESCAPED_UNICODE);
    }
    public function getNeighboursLocation($lat, $lng)
    {
        $rad = 1000;
        $result = [
            'status' => "",
            'message' => "",
            'data' => ""
        ];
        try {
            $clinics = Clinic::all();
            $data = array();
            foreach ($clinics as $cli) {
                if (isNeighbour($lat, $lng, $cli, $rad)) {
                    $location = [
                        'id' => $cli->id,
                        'name' => $cli->name,
                        'address' => $cli->address,
                        'short_description' => $cli->short_description,
                        'ward_id' => $cli->ward_id,
//                    'district_id' => $cli->district_id,
//                    'province_id' => $cli->province_id,
                        'lat' => getLat($cli->location),
                        'lng' => getLng($cli->location)
                    ];
                    array_push($data, $location);
                }
            }
            $result['status'] = 200;
            $result['message'] = "ok success";
            $result['data'] = $data;
        }
        catch ( QueryException $ex) {
            $result['status'] = $ex->getCode();
            $result['message'] = $ex->errorInfo;
        }

        //$result= getDistanceFrom2Models(Clinic::find(3),Clinic::find(50));
//        $result = isNeighbour(21.0319495,105.7991852,Clinic::find(1),2000);
//        $result = isNeighbourWith4Params(21.0319495,105.7991852,21.0409818,107.8283453,20);
//        $result = getDistanceWith4Params(21.0319495,105.7991852,21.0409818,105.8283453);
        $headers = [
            'Content-type'=> 'application/json; charset=utf-8',
            'Message' =>  $result['message']
        ];

        return Response::json($result, $result['status'], $headers, JSON_UNESCAPED_UNICODE);
    }
    public function getLocationInformation($id)
    {
        return Clinic::find($id);
    }
}
