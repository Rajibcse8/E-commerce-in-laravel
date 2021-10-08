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
    }//end function------------------------------------

    public function EditSlider($id){
         $slider=Slider::find($id);
         return view('admin.slider.edit_slider',compact('slider'));
    }

    public function UpdateSlider(Request $request,$id){
        
        if($request->file('slider_img')){
            @unlink($request->old_image);
            $image=$request->file('slider_img');
            $image_name=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(350,300)->save('upload/slider/'.$image_name);
            $img_url='upload/slider/'.$image_name;
            
            slider::findOrFail($id)->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'slider_img'=>$img_url,
            ]);

        }
        else{

            slider::findOrFail($id)->update([
                'title'=>$request->title,
                'description'=>$request->description,
            ]);
        }

        $notification=array(
            'alert'=>'success',
            'message'=>'Slider Added Sucessfully',
         );

        return redirect()->route('manage.slider')->with($notification);
    }
}
