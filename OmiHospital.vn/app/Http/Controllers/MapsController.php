<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

class MapsController extends Controller
{
    public function maps_index(){
        return view('pages.maps');
    }
}
