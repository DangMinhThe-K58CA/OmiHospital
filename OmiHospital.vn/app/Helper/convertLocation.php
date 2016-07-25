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

function getDistance($point1, $point2) {
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