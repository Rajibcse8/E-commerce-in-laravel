<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Slider;
use App\Models\Product;
use App\Models\MultiImg;

class IndexController extends Controller
{
    
    public function index(){

        $categories=Category::OrderBy('category_name_en','ASC')->get();
        $subcategories=SubCategory::OrderBy('subcategory_name_en','ASC')->get();
        $subsubcategories=SubSubCategory::OrderBy('subsubcategory_name_en','ASC')->get();
        $sliders=Slider::where('status',1)->OrderBy('id','DESC')->limit(3)->get();
        $products=Product::where('status',1)->OrderBy('id','DESC')->limit(3)->get();
        $featureds=Product::where('status',1)->where('featured',1)->OrderBy('id','DESC')->limit(6)->get();
        $hot_deals=Product::where('status',1)->where('featured',1)->where('discount_price','!=',NULL)->OrderBy('id','DESC')->limit(6)->get();
        $special_offer=Product::where('status',1)->where('special_offer',1)->OrderBy('id','DESC')->limit(6)->get();
        $special_deals=Product::where('status',1)->where('special_deals',1)->OrderBy('id','DESC')->limit(6)->get();
        $skip_category_0=Category::skip(0)->first();
        $skip_product_0=Product::where('status',1)->where('category_id',$skip_category_0->id)->OrderBY('id','DESC')->get();


       return view('frontend.index',compact('categories','subcategories','subsubcategories','sliders','products',
       'featureds','hot_deals','special_offer','special_deals','skip_category_0','skip_product_0'));
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    } 

    public function UserProfile(){
        $user=User::find(Auth::user()->id);
       return view('frontend.profile.user_profile',compact('user'));
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
         $notification=array(
             'message'=>'User Profile Update Successfully',
             'alert'=>'success',
         );
         return redirect()->route('dashboard')->with($notification);
        
    }

   public function userpasswordchange(){
       $user=User::find(Auth::user()->id);
      return  view('frontend.profile.change_password',compact('user'));
   }
   
   
   public function Updatepass(Request $request){
       $validateData= $request->validate([
          'oldpassword'=>'required',
          'password'=>'required|confirmed',
      ]);
   
       $user=User::find(Auth::user()->id);
      $haspassword=$user->password;
      if(Hash::check($request->oldpassword,$haspassword)){
          $user->password=Hash::make($request->password);
          $user->save();
          Auth::logout();
          return redirect()->route('login');
      }
      else{
          return redirct()->back();
      }
   }//end--Function 

   public function ProductView($id){
       $products=Product::findOrFail($id);
       $multiimgs=MultiImg::where('product_id',$id)->get(); 
       return view('frontend.product.product_details',compact('products','multiimgs'));  
   }//end function----------------------------------------------------------------------

   public function ProductTagsView($tags){

   
       $products=Product::where('status',1)->where('product_tag_en',$tags)->
       orderBY('id','DESC')->paginate(4)->get();

    //    dd(var_dump($products));

       $categories=Category::OrderBy('category_name_en','ASC')->get();

       return view('frontend.product.tagwise_product_view',compact('products','categories'));
   }//----------------------------------------------------------end-function

   public  function ProductSubCategoryView($id){

    $products=Product::where('status',1)->where('subcategory_id',$id)->
    orderBY('id','DESC')->paginate(4);

    
     
     $categories=Category::OrderBy('category_name_en','ASC')->get();
     $subcategory=SubCategory::find($id);
   

     return view('frontend.product.subcategory_view',compact('products','categories','subcategory'));

  

   }


}
