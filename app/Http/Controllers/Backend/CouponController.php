<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Models\coupon;


class CouponController extends Controller
{
    
    public function CouponView(){
    
         $coupons=coupon::orderBy('id','Desc')->get();
         return  view('admin.coupon.view_coupon',compact('coupons'));
              
    }

}
