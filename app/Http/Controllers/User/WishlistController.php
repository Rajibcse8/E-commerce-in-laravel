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
           
           

            Wishlist::insert([
              'user_id'=>Auth::id(),
              'product_id'=>$id,
              'created_at'=>Carbon::now(),
            ]);

            return response()->json(['success' => 'Product Successfully Add to Wishlist']);
        }

        else{
            return response()->json(['error' => 'Plese Log in At First']);
        }
        
    }
}
