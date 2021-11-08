<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\CartItem;

class CartController extends Controller
{
    
    public  function AddToCart(Request $request ,$id){
        $product=Product::findOrFail($id);
        
        if($product->discount_price == null){
            Cart::add([
                'id'=>$id,
                'name'=>$request->product_name,
                'qty'=>$request->quantity,
                'price'=>$request->selling_price,
                'option'=>[
                    'image'=>$product->product_thumbnail,
                    'color'=>$request->color,
                    'size'=>$request->size,

                ],
            ]);

           return response()->json(['success'=> 'Product Added to Cart Successfully']);

        }
        else{

            Cart::add([
                'id'=>$id,
                'name'=>$request->product_name,
                'qty'=>$request->quantity,
                'price'=>$request->selling_price-$request->discount_price,
                'option'=>[
                    'image'=>$product->product_thumbnail,
                    'color'=>$request->color,
                    'size'=>$request->size,

                ],
            ]);

            return response()->json(['success'=> 'Product Added to Cart Successfully']);

        }
    }//end--function----------------------------------------------------------------------------------------
}
