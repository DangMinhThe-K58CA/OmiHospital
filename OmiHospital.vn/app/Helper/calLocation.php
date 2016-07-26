<?php

function convert($originString) {
    $get = explode(',', $originString);
    $nLocate = explode(' ', $get[0]);
    $eLocate = explode(' ', $get[1]);
    $lat  = (float) $nLocate[0] + (float) $nLocate[1] / 60 + (float) substr($nLocate[2], 0, 2) / 3600;
    $lng = (float) $eLocate[0] + (float) $eLocate[1] / 60 + (float) substr($eLocate[2], 0, 2) / 3600;
    $result = [
      'lat' => $lat,
        'lng' => $lng,
    ];
    return $result;
}

function getDistance2Points($point1, $point2) {
    $R = 6371e3; // metres
    $x1 = deg2rad($point1['lat']);
    $x2 = deg2rad($point2['lat']);
    $dx = deg2rad(($point2['lat']-$point1['lat']));
    $dr = deg2rad(($point2['lon']-$point1['lon']));

    $a = sin($dx/2) * sin($dx/2) +
        cos($x1) * cos($x2) *
        sin($dr/2) * sin($dr/2);
    $c = 2 * atan2(sqrt($a), sqrt(1-$a));
    return $R * $c;
}


function getDistanceWith4Params($lat1, $lng1, $lat2, $lng2){
    $R = 6371e3; // metres
    $x1 = deg2rad($lat1);
    $x2 = deg2rad($lat2);
    $dx = deg2rad(($lat2-$lat1));
    $dr = deg2rad(($lng2- $lng1));

    $a = sin($dx/2) * sin($dx/2) +
        cos($x1) * cos($x2) *
        sin($dr/2) * sin($dr/2);
    $c = 2 * atan2(sqrt($a), sqrt(1-$a));
    return $R * $c;
}
function getDistanceWith5Params($lat1, $lng1, $lat2, $lng2, $unit) {
    $distance= getDistanceWith4Params($lat1, $lng1, $lat2, $lng2);
    if ($unit == "k") {
        return ($distance / 1000);
    }else {
        return $distance;
    }
}

function getDistanceByGoogleAPI($lat1, $lng1, $lat2, $lng2){

}
function getLat($location){
    $location = explode(',',$location);
    $lat = (float) $location[0];
    return $lat;
}
function getLng($location){
    $location = explode(',',$location);
    $lng = (float) $location[1];
    return $lng;
}
function getDistanceFrom2Models($model1,$model2){
    return getDistanceWith4Params(getLat($model1->location),getLng($model1->location),getLat($model2->location),getLng($model2->location));
}

function isNeighbour($lat,$lng,$model2,$radius){
    if(getDistanceWith4Params($lat,$lng,getLat($model2->location),getLng($model2->location))<=$radius){
        return true;
    }
    else return false;
}
function isNeighbourWith5Params($lat,$lng,$lat2,$lng2,$radius){
    if(getDistanceWith4Params($lat,$lng,$lat2,$lng2)<=$radius){
        return true;
    }
    else return false;
}

