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



    public  function CheckoutStore(Request  $request){


        // dd($request->all());
        $data=array();
        $data['shipping_name']=$request->shipping_name;
        $data['shipping_email']=$request->shipping_email;
        $data['shipping_phone']=$request->shipping_phone;
        $data['post_code']=$request->post_code;
        $data['division_id']=$request->division_id;
        $data['district_id']=$request->district_id;
        $data['state_id']=$request->state_id;
        $data['notes']=$request->notes;
        $data['payment_method']=$request->payment_method;


        if($request->payment_method=='stripe'){
            
            return view('frontend.payment.stripe',compact('data'));
        }

        else if($request->payment_method=='card'){


        }

        else{

            dd('cash');
        }


       


    }
}
