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

       $ship_d = ShipDistrict::where('division_id',$division_id)->get();
        return json_encode($ship_d);
        

    }


    public function find_state($district_id){
        $ship_s=ShipState::where('district_id',$district_id)->get();
        return json_encode($ship_s);
    }
}
