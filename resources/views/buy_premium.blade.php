@extends('general.preset')
@section('title')
Buy Premium
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2"> 
            <div class="panel panel-default">
                <div class="panel-heading">Plan Premium</div>
                <div class="panel-body" style="text-align: center;">
                	<form action="{{ route('payment') }}"> 
                		@if(Session::has('message'))
			                <div class="col-12-md" style="background: #00AD18; color: white; width: 100%; text-align: center;"> 
		                		<span ><h3>{{ Session::get('message') }}</h3><span>
							</div>
						@endif
	                	<div class="col-xs-12">
	                		<h4>Compra El Plan Premium Por:</h4>
	                	</div>
	                	<div class="col-xs-12">
	                		@foreach($premium as $precio) 
	                		<h2>$ {{ $precio->precio }} MXN</h2>
	                		@endforeach
	                	</div>
	                	<div class="col-xs-12">
	                		<button name="paypal" type="submit" class="btn btn-primary">
	                            Comprar Con Paypal
	                        </button>
	                        <button name="stripe" id="customButton" type="submit"  class="btn btn-primary">Comprar Con Stripe</button> 
	                	</div> 
                	</form>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://checkout.stripe.com/checkout.js"></script>
<script>
var handler = StripeCheckout.configure({
  key: 'pk_test_TLLFts1tTmeX1zG2TAjHduSJ',
  image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
  locale: 'auto',
  token: function(token) {
    // You can access the token ID with `token.id`.
    // Get the token ID to your server-side code for use.
  }
});

document.getElementById('customButton').addEventListener('click', function(e) {
  // Open Checkout with further options:
  handler.open({
    name: 'Cuenta Premium',
    description: '3.99$ Mensuales',
    zipCode: true,
    amount: 399
  });
  e.preventDefault();
});

// Close Checkout on page navigation:
window.addEventListener('popstate', function() {
  handler.close();
});
</script>
@endsection