<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Auth;

class AlluserController extends Controller
{
    //

    public function Myorders(){
        
        $orders=Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();
        return view('frontend.user.order.order_view',compact('orders'));
    }

    public function OrderView($order_id){
         
        $order=Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
        $order_item=OrderItem::where('order_id',$order_id)->orderBy('id','DESC')->get();
        return view('frontend.user.order.order_item',compact('order','order_item'));
    }
}
