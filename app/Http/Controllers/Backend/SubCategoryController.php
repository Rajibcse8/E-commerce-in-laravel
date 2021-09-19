<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SUbCategory;

class SubCategoryController extends Controller
{
    public function viewSubcategory(){

        $categories=Category::orderBy('category_name_en','ASC')->get();
        $subcategory=SubCategory::latest()->get();

        return view('admin.subcategory.subcategory_view',compact('subcategory','categories'));
    }//----end View Function

    public function SubCategoryStore(Request $request){
        $request->validate([
            'category_id'=>'required',
            'subcategory_name_en'=>'required|unique:sub_categories',
            'subcategory_name_ban'=>'required'
        ],[
            'category_id.required'=>'You Must have to Select Category'
        ]);

        SubCategory::Insert([
           'category_id'=>$request->category_id,
           'subcategory_name_en'=>$request->subcategory_name_en,
           'subcategory_name_ban'=>$request->subcategory_name_ban,
           'subcategory_slug_en'=>strtolower(str_replace(' ','-',$request->subcategory_name_en)),
           'subcategory_slug_ban'=>str_replace(' ','-',$request->subcategory_name_ban),
        ]);

        $notification=array(
            'message'=>'Sub Category Added Sucessfuylly',
            'alert'=>'success'
        );

        return redirect()->back()->with($notification);
    }
}
