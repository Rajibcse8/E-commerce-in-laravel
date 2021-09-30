<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

 use App\Models\Product;
 use App\Models\Category;
 use App\Models\SubCategoty;
 use App\Models\SubSubCategory;
 use App\Models\Brand;

class ProductController extends Controller
{
    public function AddProduct(){

         $categories=Category::latest()->get();
         $brands=Brand::latest()->get();
        return view('admin.product.product_add',compact('brands','categories'));
        
    }

    public function StoreProduct(Request $request){
        dd('dddd');
    }
    
}
