<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;

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

//--------------------------------------District funtions-----------------------------------------------------------------------
    public function DistrictView(){
        $divisions=ShipDivision::orderBy('division_name','ASC')->get();
        $districts =ShipDistrict::orderBy('id','DESC')->get();

        return view('admin.ship.district.view_district',compact('divisions','districts'));

    }

    public function DistrictStore(Request $request){
       // dd($request->all());

        $request->validate([
          'district_name'=>'required',
          'division_id'=>'required'
        ]
    );

      ShipDistrict::insert([
        'district_name'=>$request->district_name,
        'division_id'=>$request->division_id,
      ]);
      
      $notification=array(
        'message'=>'category data  Added Successfully',
        'alert'=>'success',
     );

     return redirect()->back()->with($notification);
    }

    public function DistrictEdit($id){ 

      
      
        $divisions=ShipDivision::orderBy('division_name','ASC')->get();
        $districts=ShipDistrict::findOrFail($id);
        //dd($districts->division_id);
        return view('admin.ship.district.edit_district',compact('divisions','districts'));

    }


    public function DistrictUpdate(Request $request,$id){

        ShipDistrict::findOrFail($id)->update([
          
            'division_id'=>$request->division_id,
            'district_name'=>$request->district_name,
        ]);

        $notification=array(
            'message'=>'District Data Edited uccessfully',
            'alert'=>'success',
         );

         return redirect()->route('ship.district')->with($notification);
    }


    public function DistrictDelete ($id)
    {

        ShipDistrict::findOrFail($id)->delete();

        
        $notification=array(
            'message'=>'District Deleted Successfully',
            'alert'=>'danger',
         );

         return redirect()->route('ship.district')->with($notification);

    }
//---------------------State-Functions-------------------------------------------------------------


 public function StateView(){
    
    $divisions=ShipDivision::orderBy('id','DESC')->get();
    $districts=ShipDistrict::orderBy('id','DESC')->get();
    $states=ShipState::orderBy('id','DESC')->get();
    
   
      return  view('admin.ship.state.view_state',compact('divisions','districts','states'));

 }

 public function StateStore(Request $request){
  
    //  dd($request->all());
       
    ShipState::insert([
        'state_name'=>$request->state_name,
        'division_id'=>$request->division_id,
        'district_id'=>$request->district_id,
    ]);


    $notification=array(
        'message'=>'State added Successfully',
        'alert'=>'success',
     );

     return redirect()->back()->with($notification);


 }

 public function StateEdit($id){
     $states=ShipState::findOrFail($id);
     $divisions=ShipDivision::get();
     $districts=ShipDistrict::get();

     return view('admin.ship.state.edit_state',compact('states','divisions','districts'));
 }




}
