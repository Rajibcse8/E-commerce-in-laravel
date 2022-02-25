<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    

    public function StripeOrder(Request  $request){

     
   \Stripe\Stripe::setApiKey('sk_test_4eC39HqLyjWDarjtT1zdp7dc');

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
