<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

 use App\Models\Product;
 use App\Models\Category;
 use App\Models\SubCategoty;
 use App\Models\SubSubCategory;
 use App\Models\Brand;
 use App\Models\MultiImg;


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
        //dd($request->all());

        $image=$request->file('product_thumbnail');
        $image_name=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(900,1000)->save('upload/products/thumbnails/'.$image_name);

        $image_url='upload/products/thumbnails/'.$image_name;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_ban' => $request->product_name_ban,
            'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_ban' => str_replace(' ', '-', $request->product_name_ban),
            'product_code' => $request->product_code,
  
            'product_qty' => $request->product_qty,
            'product_tag_en' => $request->product_tag_en,
            'product_tag_ban' => $request->product_tag_ban,
            'product_size_en' => $request->product_size_en,
            'product_size_ban' => $request->product_size_ban,
            'product_color_en' => $request->product_color_en,
            'product_color_ban' => $request->product_color_ban,
  
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_ban' => $request->short_descp_ban,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_ban' => $request->long_descp_ban,
  
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
  
            'product_thumbnail' => $image_url,
            'status' => 1,
            'created_at' => Carbon::now(),   	 
        ]);

        //---------Multiple Image Insert----------------------------

        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(900,1000)->save('upload/products/multi-image/'.$make_name);
            $uploadPath = 'upload/products/multi-image/'.$make_name;

          MultiImg::insert([

    		'product_id' => $product_id,
    		'image_name' => $uploadPath,
    		'created_at' => Carbon::now(), 

    	]);

      }

      $notification = array(
        'message' => 'Product Inserted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);


  
        
    }
    
}
