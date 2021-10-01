<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

 use App\Models\Product;
 use App\Models\Category;
 use App\Models\SubCategoty;
 use App\Models\SubSubCategory;
 use App\Models\Brand;
 use Image;
 use Carbon\Carbon;
 
 
class ProductController extends Controller
{
    public function AddProduct(){

         $categories=Category::latest()->get();
         $brands=Brand::latest()->get();
        return view('admin.product.product_add',compact('brands','categories'));
        
    }

    public function StoreProduct(Request $request){

        $image=$request->file('product_thumbnail');
        $image_name=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(300,300)->save('upload/produuct/thumbnail/'.$image_name);

        $image_url='upload/product/thumbnail/'.$image_name;

        Product::insert([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_hin' => str_replace(' ', '-', $request->product_name_hin),
            'product_code' => $request->product_code,
  
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_hin' => $request->product_tags_hin,
            'product_size_en' => $request->product_size_en,
            'product_size_hin' => $request->product_size_hin,
            'product_color_en' => $request->product_color_en,
            'product_color_hin' => $request->product_color_hin,
  
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_hin' => $request->short_descp_hin,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_hin' => $request->long_descp_hin,
  
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
  
            'product_thambnail' => $image_url,
            'status' => 1,
            'created_at' => Carbon::now(),   	 
  
  
  
  
  
        ]);
  
        
    }
    
}
