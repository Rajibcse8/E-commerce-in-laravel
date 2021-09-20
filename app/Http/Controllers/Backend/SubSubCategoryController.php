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

    
}
