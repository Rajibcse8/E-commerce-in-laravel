<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;

class BrandController extends Controller
{
    //
    public function viewBrand(){
       $brands=Brand::latest()->get();
       return view('admin.brand.brand_view',compact('brands'));
    }

    public function BrandStore(Request $request){

       
          
        $request->validate([
             'brand_name_en'=>'required|unique:brands',
             'brand_name_ban'=>'required|unique:brands',
             'brand_image'=>'required|mimes:png,jpg,gif',
         ],[
             'brand_name_en.required'=>'Plese Enter Brand Name In English',
             'brand_name_en.unique'=>'You Should not Enter Same Brand Name Which ios already Exist in database',
              'brand_name_ban.required'=>'Plese Enter Brand Name in Bangla',   
         ]);

        $image=$request->file('brand_image');
    	$image_name=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(300,300)->save('upload/brand/'.$image_name);
      
    

       

        Brand::insert([
            'brand_name_en'=>$request->brand_name_en,
            'brand_name_ban'=>$request->brand_name_ban,
            'brand_slug_en'=>strtolower(str_replace(' ','-',$request->brand_name_en)),
            'brand_slug_ban'=>str_replace(' ','-',$request->brand_name_ban),
            'brand_image'=>$image_name,
        ]);

        $notification=array(
           'message'=>'Brand insert Successfully',
           'alert'=>'success',
        );
        return redirect()->back()->with($notification);
        
     }

     public function Editbrand($id){
         $brands= Brand::find($id);
        return view('admin.brand.brand_edit',compact('brands'));
     }

     public function Updatedata(Request $request, $id){
        
        $request->validate([
            'brand_name_en'=>'required',
            'brand_name_ban'=>'required',
            'brand_image'=>'mimes:png,jpg,gif,jpeg',
        ],[
            'brand_name_en.required'=>'Plese Enter Brand Name In English',
            'brand_name_en.unique'=>'You Should not Enter Same Brand Name Which ios already Exist in database',
            'brand_name_ban.required'=>'Plese Enter Brand Name in Bangla',   
        ]);
        
         $brand=Brand::find($id);
         $brand->brand_name_en=$request->brand_name_en;
         $brand->brand_name_ban=$request->brand_name_ban;
         $brand->brand_slug_en=strtolower(str_replace(' ','-',$request->brand_name_en));
         $brand->brand_slug_en=str_replace(' ','-',$request->brand_name_ban);
         
         if($request->file('brand_image')){
          
           @unlink(public_path('upload/brand/').$brand->brand_image);
           $image=$request->file('brand_image');
           $image_name=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(300,300)->save('upload/brand/'.$image_name);
            $brand->brand_image=$image_name;
         }

         $brand->save();
        $notification= array(
            'message'=>'Brand Data Update Successfully',
            'alert'=>'info',
            );
         return redirect()->route('all.brand')->with($notification);
     }
}
