<?php

namespace App\Http\Controllers\User;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;

class WishlistController extends Controller
{
    public function AddToWishList(Request $requsest,$id){


        if(Auth::check()){
            //return response()->json('success','Successful');
        }

        else{
            return response()->json(['error' => 'Plese Log in At First']);
        }
        
    }
}
