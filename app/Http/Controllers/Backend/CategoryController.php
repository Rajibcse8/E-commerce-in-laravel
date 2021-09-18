<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    

    public function viewCategory(){
        $categorry=Category::latest()->get();
        return view('admin.category.category_view',compact('category'));
    }

    public function CategoeryStore(Request $request){
           
    }
}
