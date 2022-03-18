<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    

    public function StripeOrder(Request  $request){

     
   \Stripe\Stripe::setApiKey('sk_test_51Keb80CUXGp836nN8xsLEEpFxQfCRcvi6AqW5I36JcRDj5l66EdPVlVl7xlBRnrhcU1VQ4DnUTAu9DUU1Jh838Qj00WEjVzIc3');
   
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
