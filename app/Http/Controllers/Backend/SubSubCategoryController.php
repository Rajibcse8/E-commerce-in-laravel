<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;

class SubSubCategoryController extends Controller
{

    public function viewSubSubcategory(){
        $categories=Category::orderBy('category_name_en','ASC')->get();
        $subsubcategory=SubSubCategory::latest()->get();
        return view('admin.subsubcategory.subsubcategory_view',compact('subsubcategory','categories'));
    }

    public function SubSubCategoryStore(Request $request){

        $request->validate([
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'subsubcategory_name_en'=>'required|unique:sub_sub_categories',
            'subsubcategory_name_ban'=>'required|unique:sub_sub_categories',
        ]);
        ;

        SubSubCategory::insert([
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'subsubcategory_name_en'=>$request->subsubcategory_name_en,
            'subsubcategory_name_ban'=>$request->subsubcategory_name_ban,
            'subsubcategory_slug_en'=>strtolower(str_replace(' ','-',$request->subsubcategory_name_en)),
            'subsubcategory_slug_ban'=>str_replace(' ','-',$request->subsubcategory_name_ban),

        ]);

        $notification=array(
            'message'=>'Data Added Successfully',
            'alert'=>'success',
        );
        return redirect()->back()->with($notification);
        
    }

    
}
