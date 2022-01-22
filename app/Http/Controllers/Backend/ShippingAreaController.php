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



    public function DivEdit($id){
        $divisions= ShipDivision::findorFail($id);
        return view('admin.ship.division.division_edit',compact('divisions'));
    }

    public function DivUpdate(Request $request,$id){

        ShipDivision::findorFail($id)->update([
          'division_name'=>$request->division_name,
        ]);

        $notifiaction=array([
            'messege'=>'Shipping Area Added Successful',
            'alert'=>'success',
         ]);

       return redirect()->route('manage.shipping')->with($notifiaction);

       
    }
   
    public function DivDelete($id){
        ShipDivision::findOrFail($id)->delete();

        $notifiaction=array([
            'messege'=>'Coupon Edited Successful',
            'alert'=>'danger',
         ]);
 
 
         return  redirect()->back()->with($notifiaction);

    }

}
