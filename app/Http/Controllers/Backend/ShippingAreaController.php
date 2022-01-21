<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use Carbon\Carbon;

class ShippingAreaController extends Controller
{
    
    public function AreaView(){


        $shippings=ShipDivision::orderBy('id','DESC')->get();
        return view('admin.ship.division.view_division',compact('shippings'));
        
    }


    public function DivStore(Request $request){

       

        ShipDivision::insert([
            'division_name'=>$request->division_name,
            'created_at'=>Carbon::now(),
        ]);

       
        $notifiaction=array([
            'messege'=>'Shipping Area Added Successful',
            'alert'=>'success',
         ]);

         return  redirect()->back()->with($notifiaction);
    }
}
