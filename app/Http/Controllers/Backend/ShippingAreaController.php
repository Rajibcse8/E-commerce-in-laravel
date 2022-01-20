<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;

class ShippingAreaController extends Controller
{
    
    public function AreaView(){


        $shippings=ShipDivision::orderBy('id','DESC')->get();
        return view('admin.ship.division.view_division');

    }
}
