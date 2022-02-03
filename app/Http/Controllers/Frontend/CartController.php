<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;


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
        return response()->json(['success'=>'Successfully remove from Cart']);
       

    }     

    public function CouponApply(Request $request){

         
        // return response()->json(['success'=>$request->coupon_name]);
                

         $coupon=Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();

        // return response()->json(['success'=>$request->coupon_name]);
        
         if($coupon){
           
            
            Session::put('coupon',[
                'coupon_name'=>$coupon->coupon_name,
                'coupon_amount'=>$coupon->coupon_amount,
                'discount_amount'=>round (Cart::total() * $coupon->coupon_amount/100),
                'total_amount'=> round( Cart::total() - (Cart::total() * $coupon->coupon_amount/100))
            ]);

            return response()->json(array(
              'success'=>'Coupon Applied Successfully',
            ));
            
         }

         else{

             return response()->json(['error'=>'InValid Coupon']);
         }

    }


    public function CouponCalculations(){

        if (Session::has('coupon')) {
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ));
        }else{
            return response()->json(array(
                'total' => Cart::total(),
            ));

        }

    }

}
