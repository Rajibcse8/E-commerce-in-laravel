<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;
class CheckoutController extends Controller
{
    
    public  function find_district( $division_id){

       $ship_district = ShipDistrict::where('division_id',$division_id)->get();
        return json_encode($ship_district);

    }
}
