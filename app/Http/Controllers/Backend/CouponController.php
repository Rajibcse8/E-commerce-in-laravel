<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Coupon;


class CouponController extends Controller
{
    
    public function CouponView(){
    
         $coupons=Coupon::orderBy('id','Desc')->get();
         return  view('admin.coupon.view_coupon',compact('coupons'));
              
    }

    public function Store(Request $request){

        $request->validate([
         'coupon_name'=>'required',
         'coupon_amount'=>'required',
         'coupon_validity'=>'required',
         'created_at'=>Carbon::now(),
        ]);

        Coupon::insert([
            'coupon_name'=>strtoupper($request->coupon_name),
            'coupon_amount'=>$request->coupon_amount,
            'coupon_validity'=>$request->coupon_validity, 
        ]);

        $notifiaction=array([
           'messege'=>'Coupon Added Successful',
           'alert'=>'success',
        ]);


        return  redirect()->back()->with($notifiaction);



    }

    public function Edit($id){

        $coupons=Coupon::FindOrFail($id);

        return view('admin.coupon.edit_coupon',compact('coupons'));
    }


    public function Update(Request $request, $id){


        $request->validate([
            'coupon_name'=>'required',
            'coupon_amount'=>'required',
            'coupon_validity'=>'required',
            
           ]);
   
           Coupon::findOrFail($id)->update([
               'coupon_name'=>strtoupper($request->coupon_name),
               'coupon_amount'=>$request->coupon_amount,
               'coupon_validity'=>$request->coupon_validity,
               'updated_at'=>Carbon::now(), 
           ]);
   
           $notifiaction=array([
              'messege'=>'Coupon Edited Successful',
              'alert'=>'success',
           ]);
   
   
           return  redirect()->route('manage.coupon')->with($notifiaction);


    }


    public function Delete($id){
        Coupon::findOrFail($id)->delete();

        $notifiaction=array([
            'messege'=>'Coupon Edited Successful',
            'alert'=>'danger',
         ]);
 
 
         return  redirect()->back()->with($notifiaction);

    }



}
