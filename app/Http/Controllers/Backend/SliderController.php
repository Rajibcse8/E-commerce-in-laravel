<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function ViewSlider(){
        
        return view('admin.slider.slider_view');
    }
}
