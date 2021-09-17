<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    //
    public function viewBrand(){
       $brands=Brand::latest()->get();
       return view('admin.brand.brand_view',compact('brands'));
    }

    public function BrnadStore(Request $request){

          
    }
}
