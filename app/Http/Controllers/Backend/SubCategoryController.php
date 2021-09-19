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
    }//------end Adding data


    public function SubCategoryEdit($id){
        $categories=Category::orderBy('category_name_en','ASC')->get();
        $subcategory=SubCategory::find($id);
        return view('admin.subcategory.subcategory_edit',compact('subcategory','categories'));
    }//------------------Edit

    public function SubCategoryUpdate(Request $request,$id){
          $request->validate([
           'category_id'=>'required',
           'subcategory_name_en'=>'required',
           'subcategory_name_ban'=>'required',
          ],
          [
            'category_id.required'=>'You Must have to Select Category',
        ]);

        SubCategory::findOrFail($id)->Update([
            'category_id'=>$request->category_id,
            'subcategory_name_en'=>$request->subcategory_name_en,
            'subcategory_name_ban'=>$request->subcategory_name_ban,
            'subcategory_slug_en'=>strtolower(str_replace(' ','-',$request->subcategory_name_en)),
            'subcategory_slug_ban'=>str_replace(' ','-',$request->subcategory_name_ban),
        ]);

        $notification=array(
            'message'=>'Sub Category Updated Sucessfuylly',
            'alert'=>'success'
        );

        return redirect()->route('all.sub.category')->with($notification);
    }//----Updated data

    public function DeleteSubCategory($id){

        SubCategory::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Sub Category Delete Sucessfuylly',
            'alert'=>'info'
        );

        return redirect()->route('all.sub.category')->with($notification);
        

    }
}
