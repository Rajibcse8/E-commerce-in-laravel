<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    

    public function StripeOrder(Request  $request){

     
   \Stripe\Stripe::setApiKey('sk_test_51KX71JD0xQ6Aup57GRP2ivUrhvtbSfQ4TpXUnKq2TF7DZ9f7uF1mW1Xmyh3b18FwfUtYFN7ZAxM3Cdv6BMcsGvu000Ht9Xrqa5');

   $token = $_POST['stripeToken'];
   $charge = \Stripe\Charge::create([
     'amount' => 999*84,
     'currency' => 'usd',
     'description' => 'Example charge',
     'source' => $token,
     'metadata' => ['order_id' => '6735'],
    ]);

    dd($charge);

  
}

}
