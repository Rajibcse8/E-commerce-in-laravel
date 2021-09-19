<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SUbCategory;

class SubCategoryController extends Controller
{
    public function viewSubcategory(){

        $subcategory=SubCategory::latest()->get();

        return view('admin.subcategory.subcategory_view',compact('subcategory'));
    }
}
