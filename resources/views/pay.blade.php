@extends('general.preset')
@section('title')
Pay
@endsection
@section('content')
<div class="container">
 <div class="row">
 <div class="col-md-10 col-md-offset-1">
 <div class="panel panel-default">
 <div class="panel-heading">Payment</div>
 
 <div class="panel-body">
    <form action="{{ route('pay') }}" method="POST">
        @if(Session::has('message'))
                            <div class="col-12-md" style="background: #00AD18; color: white; width: 100%; text-align: center;"> 
                                <span ><h3>{{ Session::get('message') }}</h3><span>
                            </div>
                        @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <script
                src="https://checkout.stripe.com/checkout.js" 
                class="stripe-button"
                data-key="pk_test_TLLFts1tTmeX1zG2TAjHduSJ"
                data-amount="399"
                data-name="Pago mensual"
                data-description="3.99 $ "
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-zip-code="true"> 
            </script>
    </form>
 </div>
 </div>
 </div>
 </div>
</div>
@endsection