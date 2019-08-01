<?php

namespace videos\Http\Controllers;
use Laravel\Cashier\Cashier;
use Illuminate\Http\Request;
use videos\User;
use DB;
Use Auth;

class PayController extends Controller
{
    public function view(){
    	return view('pay');
    }
    public function process(Request $request){
    	// Set your secret key: remember to change this to your live secret key in production
		// See your keys here: https://dashboard.stripe.com/account/apikeys
		\Stripe\Stripe::setApiKey("sk_test_8cKR6CM7ESTALxvqEUy0rDsA");

    	Cashier::useCurrency('mxn', '$');
    	$id = Auth::user()->id;
    	$mail = Auth::user()->email;
    	$user = User::find($id); 
    	$input = $request->all(); 
		$user->newSubscription('main', 'premium');
		try {
		   //$response = $user->charge(100);
		} catch (Exception $e) {
		    return back()->with('message',$e);
		}
				

		// Token is created using Stripe.js or Checkout!
		// Get the payment token submitted by the form:
		$token = $_POST['stripeToken'];

		// Charge the user's card:
		$charge = \Stripe\Charge::create(array(
		  "amount" => 399,
		  "currency" => "mxn",
		  "description" => "Example charge",
		  "source" => $token,
		));
		//return view('pay');
        return back()->with('message','Subscription is completed.');
    }
}
