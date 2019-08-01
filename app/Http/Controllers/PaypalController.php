<?php

namespace videos\Http\Controllers;

use Illuminate\Http\Request; 

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use videos\Order;
use videos\OrderItem;
use DB; 
Use Auth;
class PaypalController extends Controller
{
	
	public function checkoption()
    {
        //check which submit was clicked on
        if(Input::get('paypal')) {
            $this->postPayment(); //if login then use this method
        } elseif(Input::get('stripe')) {
            $this->stripepayment(); //if register then use this method
        }

    }    
    private $_api_context;
	public function __construct()
	{
		// setup PayPal api context
		$paypal_conf = \Config::get('paypal');
		$this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
		$this->_api_context->setConfig($paypal_conf['settings']);
	}
	public function postPayment(Request $request)
	{ 
		$payer = new Payer();
		$payer->setPaymentMethod('paypal');
		$items = array();
		$subtotal = 0;
		$cart = DB::table('premium')
    		->get();
		$currency = 'MXN';
		$user_name = Auth::user()->nick;
		foreach($cart as $producto){
			$item = new Item();
			$item->setName($user_name)
			->setCurrency($currency)
			->setDescription('Cuenta Premium')
			->setQuantity($producto->id)
			->setPrice($producto->precio);
			$items[] = $item;
			$subtotal += $producto->id * $producto->precio;
		}
		$item_list = new ItemList();
		$item_list->setItems($items);
		$details = new Details();
		$details->setSubtotal($subtotal)
		->setShipping(0);
		$total = $subtotal;
		$amount = new Amount();
		$amount->setCurrency($currency)
			->setTotal($total)
			->setDetails($details);
		$transaction = new Transaction();
		$transaction->setAmount($amount)
			->setItemList($item_list)
			->setDescription('Compra De Cuenta Premium');
		$redirect_urls = new RedirectUrls();
		$redirect_urls->setReturnUrl(\URL::route('payment.status'))
			->setCancelUrl(\URL::route('payment.status'));
		$payment = new Payment();
		$payment->setIntent('Sale')
			->setPayer($payer)
			->setRedirectUrls($redirect_urls)
			->setTransactions(array($transaction));
		try {
			$payment->create($this->_api_context);
		} catch (\PayPal\Exception\PPConnectionException $ex) {
			if (\Config::get('app.debug')) {
				echo "Exception: " . $ex->getMessage() . PHP_EOL;
				$err_data = json_decode($ex->getData(), true);
				exit;
			} else {
				die('Ups! Algo salió mal');
			}
		}
		foreach($payment->getLinks() as $link) {
			if($link->getRel() == 'approval_url') {
				$redirect_url = $link->getHref();
				break;
			}
		}
		// add payment ID to session
		\Session::put('paypal_payment_id', $payment->getId());
		if(isset($redirect_url)) {
			// redirect to paypal
			return \Redirect::away($redirect_url);
		}
		return \Redirect::route('buy_premium')
			->with('error', 'Ups! Error desconocido.');
	}
	public function getPaymentStatus()
	{
		// Get the payment ID before session clear
		$payment_id = \Session::get('paypal_payment_id');
		// clear the session payment ID
		\Session::forget('paypal_payment_id');

		$payerId = request()->PayerID;
		$token = request()->token;

		//if (empty(\Input::get('PayerID')) || empty(\Input::get('token'))) {
		if (empty($payerId) || empty($token)) {
			return \Redirect::route('buy_premium')
				->with('message', 'Hubo un problema al intentar pagar con Paypal');
		}
		$payment = Payment::get($payment_id, $this->_api_context);
		// PaymentExecution object includes information necessary 
		// to execute a PayPal account payment. 
		// The payer_id is added to the request query parameters
		// when the user is redirected from paypal back to your site
		$execution = new PaymentExecution();
		$execution->setPayerId(request()->PayerID);
		//Execute the payment
		$result = $payment->execute($execution, $this->_api_context);
		//echo '<pre>';print_r($result);echo '</pre>';exit; // DEBUG RESULT, remove it later
		if ($result->getState() == 'approved') { // payment made
			// Registrar el pedido --- ok
			// Registrar el Detalle del pedido  --- ok
			// Eliminar carrito 
			// Enviar correo a user
			// Enviar correo a admin
			// Redireccionar
			$this->saveOrder(DB::table('premium')
    		->get());
			\Session::forget('cart');
			return \Redirect::route('buy_premium')
				->with('message', 'Premium Activado Por Un Mes');
		}
		return \Redirect::route('buy_premium')
			->with('message', 'La compra fue cancelada');
	}
	private function saveOrder($cart)
	{
	    $subtotal = 0;
	    foreach($cart as $producto){
	        $subtotal += $producto->id * $producto->precio;
	    }
	    
	    $user_id = Auth::user()->id;
	    DB::table('users')
            ->where('id', $user_id)
            ->update(['premium' => 1]);
	    
	   /* foreach($cart as $producto){
	        $this->saveOrderItem($producto, $order->id);
	    }*/
	}
	
	private function saveOrderItem($item, $order_id)
	{
		OrderItem::create([
			'quantity' => $item->quantity,
			'price' => $item->price,
			'product_id' => $item->id,
			'order_id' => $order_id
		]);
	}

}
