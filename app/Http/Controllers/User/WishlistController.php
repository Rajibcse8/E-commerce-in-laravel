<?php

namespace App\Http\Controllers\User;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Wishlist;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;

class WishlistController extends Controller
{
    public function AddToWishList(Request $requsest,$id){


        if(Auth::check()){
           
           $exist=Wishlist::Where('user_id',Auth::id())->Where('product_id',$id)->first();
        
           if($exist){

               return response()->json(['error'=>'This Product is ALready Exist in Your Wishlist']);
           }

           else{
             
            Wishlist::insert([
                'user_id'=>Auth::id(),
                'product_id'=>$id,
                'created_at'=>Carbon::now(),
              ]);
  
              return response()->json(['success' => 'Product Successfully Add to Wishlist']); 
             
           }
        
        }

        else{
            return response()->json(['error' => 'Plese Login At First']);
        }
        
    }


    public function ViewWishlist(){
        
       return view('frontend.wishlist.view_wishlist');
    }


    public function GetWishlistProduct(){

        $wishlist=Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
        return response()->json($wishlist);
    }

    public function RemoveWishlistItem($id){
        Wishlist::where('product_id',$id)->where('user_id',Auth::id())->delete();
        return response()->json(['success'=>'Successfully product remove']);
    }

}
