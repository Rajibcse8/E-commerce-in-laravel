<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    

    public function viewCategory(){
        $category=Category::latest()->get();
        return view('admin.category.category_view',compact('category'));
    }

    public function CategoeryStore(Request $request){
           
        $request->validate([
            'category_name_en'=>'required|unique:categories',
            'category_name_ban'=>'required|unique:categories',
            'category_icon'=>'required',
        ],[
            'category_name_en.required'=>'Plese Enter category Name In English',
            'category_name_en.unique'=>'You Should not Enter Same category Name Which ios already Exist in database',
             'category_name_ban.required'=>'Plese Enter category Name in Bangla',   
        ]);

    

       Category::insert([
           'category_name_en'=>$request->category_name_en,
           'category_name_ban'=>$request->category_name_ban,
           'category_slug_en'=>strtolower(str_replace(' ','-',$request->category_name_en)),
           'category_slug_ban'=>str_replace(' ','-',$request->category_name_ban),
           'category_icon'=>$request->category_icon,
       ]);

       $notification=array(
          'message'=>'category data  Added Successfully',
          'alert'=>'success',
       );
       return redirect()->back()->with($notification);

    }
}
