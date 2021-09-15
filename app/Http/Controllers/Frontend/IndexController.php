<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class IndexController extends Controller
{
    
    public function index(){
       return view('frontend.index');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    } 

    public function UserProfile(){
        $user=User::find(Auth::user()->id);
       return view('frontend.body.user_profile',compact('user'));
    }

    public function userprofileupdate(Request $request){

        $data=User::find(Auth::user()->id);
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
    
        if($request->file('profile_photo_path')){
         
            @unlink(public_path('upload/admin_images/').$data->profile_photo_path);
            $file=$request->file('profile_photo_path');
            $file_name=Date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$file_name);
            $data->profile_photo_path=$file_name;
        }

         $data->save();
         return redirect()->route('dashboard');
        
    }
}
