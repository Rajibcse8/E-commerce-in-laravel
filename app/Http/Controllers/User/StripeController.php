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
class StripeController extends Controller
{
    

    public function StripeOrder(Request  $request){

     
   \Stripe\Stripe::setApiKey('sk_test_51Keb80CUXGp836nN8xsLEEpFxQfCRcvi6AqW5I36JcRDj5l66EdPVlVl7xlBRnrhcU1VQ4DnUTAu9DUU1Jh838Qj00WEjVzIc3');
   
   $token = $_POST['stripeToken'];

   if(Session::has('coupon')){
    $total_amount=Session::get('coupon')['total_amount'];
  }
  else{
    $total_amount=round(Cart::total());
  }

   $charge = \Stripe\Charge::create([
     'amount' =>$total_amount,
     'currency' => 'usd',
     'description' => 'Example charge',
     'source' => $token,
     'metadata' => ['order_id' => uniqid()],
    ]);



    $order_id=Order::insertGetId([
       
      'user_id'=>Auth::id,
      'division_id'=>$request->division_id,
      'district_id'=>$request->district_id,
      'state_id'=>$request->state_id,
      'name'=>$request->name,
      'email'=>$request->email,
      'phone'=>$request->phone,
      'post_code'=>$request->post_code,
      'notes'=>$request->notes,

      
      'payment_type'=>'Stripe',	
    	'payment_method'=>$charge->payment_method,	
  	  'transaction_id'=>$charge->balance_transaction,
      'currency'=>$charge->currency,
      'amount'=>$total_amount,	
    	'order_number'=>$charge->metadata->order_id,
	  	'invoice_no'=>'RAJIB'.mt_rand(100000,999999),	
    	'order_date'=>Carbon::now()->format('d F Y'),
    	'order_month'=>Carbon::now()->format('F'),
	  	'order_year'=>Carbon::now()->format('Y'),
		  // 'confirmed_date'=>,
		  // 'processing_date'=>,
		  // 'picked_date'=>s,
		  // 'shipped_date'=>,
		  // 'delivered_date'=>,
		  // 'cancel_date'=>,
		  // 'return_date'=>,
	  	// 'return_reason'=>,
      'status'=>'Pending',
      'created_at'=>Carbon::now(),

    ]);

    $carts=Cart::content();

    foreach($carts as $cart){
         
      OrderItem::insert([
        'order_id '=>$order_id,
        'product_id'=>$cart->id,
        'color'=>$cart->options->color,
        'size'=>$cart->options->size,
        'qty'=>$cart->qty,
        'price'=>$cart->price,
        'created_at'=>Carbon::now(),

      ]);
       
    }

    if(Session::has('coupon'))Session::forget('coupon');
    Cart::destroy();

    $notification=array(
      'message'=>'Order place Successfully',
      'alert-type'=>'success',
  );
  return redirect()->route('dashboard')->with($notification);

    

    //dd($charge);

  
}

}
