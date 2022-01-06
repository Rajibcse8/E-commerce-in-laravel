<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartPageController extends Controller
{
    public function MycartPage(){
        
        return view('frontend.wishlist.view_mycart');
    }
}
