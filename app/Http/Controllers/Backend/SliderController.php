<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Carbon;
use Image;

class SliderController extends Controller
{
    public function ViewSlider(){

       
       $sliders=Slider::latest()->get(); 
       return view('admin.slider.slider_view',compact('sliders'));
    }

    public function StoreSlider(Request $request){
        
        $request->validate([
          'title'=>'required',
          'slider_img'=>'required|mimes:png,jpg,jpeg,gif',
        ],[
            'slider_img.required'=>'Plese Select Sldier Imnage',
            'slider_img.mimes'=>'plese select Image',
        ]);

        $image=$request->file('slider_img');
        $image_name=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(350,350)->save('upload/slider/'.$image_name);
        $img_url='upload/slider/'.$image_name;
        //dd($img_url);

        Slider::insert([
            'title'=>$request->title,
            'description'=>$request->description,
            'slider_img'=>$img_url,
            'status'=>'1',
        ]);
        
        $notification=array(
           'alert'=>'success',
           'message'=>'Slider Added Sucessfully',
        );

        return redirect()->bacK()->with($notification);





    }
}
