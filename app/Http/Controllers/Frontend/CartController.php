<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    
    public  function AddToCart(Request $request ,$id){
        $product=Product::findOrFail($id);

       
        
        if($product->discount_price == NULL){
            Cart::add([
                'id'=>$id,
                'name'=>$request->product_name,
                'qty'=>$request->quantity,
                'price'=>$product->selling_price,
                'weight' => 1, 
                'options' => [
    				'image' => $product->product_thumbnail,
    				'color' => $request->color,
    				'size' => $request->size,
    			], 
            ]);

           return response()->json(['success'=> 'Product Added to Cart Successfully']);

        }
        else{

           Cart::add([
                'id'=>$id,
                'name'=>$request->product_name,
                'qty'=>$request->quantity,
                'price'=>$product->selling_price-$product->discount_price,
                
                'weight' => 1, 
                'options' => [
    				'image'=>$product->product_thumbnail,
    				'color' => $request->color,
    				'size' => $request->size,
    			], 
            ]);
           

            return response()->json(['success'=> 'Product Added to Cart Successfully']);

        }
    }//end--function---------------------------


    public function AddminiCart(){
        $carts=Cart::content();
        $cart_qty=Cart::count();
        $cart_total=Cart::total();

        return response()->json(array(
            'carts'=>$carts,
            'cart_qty'=>$cart_qty,
            'cart_total'=>round($cart_total),
        ));

    }

    public function RemoveMiniCart($rowID){

        Cart::remove($rowID);
        return response()->json(['success'=>'Product Remove from Cart Successfully',]);

    }     

}
