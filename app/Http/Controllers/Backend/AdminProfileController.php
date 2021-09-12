<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;

class AdminProfileController extends Controller
{

    public function AdminProfile(){
        
        $adminData=Admin::find(1);
        return view('admin.admin_profile_view',compact('adminData'));
    } 

    public function AdminProfileEdit(){

        $editData=Admin::find(1);
        return view('admin.admin_profile_edit',compact('editData'));
    }

    public function AdminProfileUpadate(Request $request){
        $data=Admin::find(1);
        $data->name=$request->name;
        $data->email=$request->email;

        if($request->file('profile_photo_path')){
            @unlink(public_path('upload/admin_images/').$data->profile_photo_path);
            $file=$request->file('profile_photo_path');
            $file_name=Date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$file_name);
            $data->profile_photo_path=$file_name;
        }
        $data->save();

        $notification=array(
            'message'=>'Admin Profile Update Successfully',
            'alert-type'=>'success',
        );
        return redirect()->route('admin.profile')->with($notification);

    }

    public function AdminUpdatePassword(){
        return view('admin.admin_password_change');
    }
    public function AdminPasswordupdate(Request $request){
        dd('hello');
    }
    
}
