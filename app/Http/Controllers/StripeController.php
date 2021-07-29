<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Session;
class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('about');
    }
   
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * 250,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "This payment is for testing purpose habeshababysitters.com"
        ]);
   
        Session::flash('success', 'Payment successful!');
           
        return back();
    }
}