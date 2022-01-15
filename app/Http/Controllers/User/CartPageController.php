<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;

class CartPageController extends Controller
{
    public function MycartPage(){
        
        return view('frontend.wishlist.view_mycart');
    }


    public function GetCartProduct(){


        $carts=Cart::content();
        $cartQty=Cart::count();
        $carttotal=Cart::total();

        return response()->json(array(
            'carts'=>$carts,
            'cartQty'=>$cartQty,
            'carttotal'=>round($carttotal),
        ));
    }


    public function CartPageRemove($id){

        Cart::remove($id);
        return response()->json(['success'=>'Cart Product Remove Sucessfully']);
       
    }

    public function CartQtyInc($id){
        $cart_item= Cart::get($id);
        Cart::update($id,$cart_item->qty+1);

       return response()->json(['msg'=>'hello']);
        

    }


    public function CartQtyDec($id){
        $cart_item=Cart::get($id);
        if($cart_item->qty>1){
          
            Cart::update($id,$cart_item->qty-1);
            return response()->json(['success'=>'Success']);
        }

        else{
            return response()->json(['error'=>'Product Quantity Must be Greatert than  1']);
        }
    }
}
