@extends('front.master')

@section('content')
	<!-- Page Title -->
    <section class="page-title" style="background-image: url('{{asset('theme/images/background/10.jpg')}}')">
    	<div class="auto-container">
			<h1>Food Basket</h1>
			<ul class="page-breadcrumb">
				<li><a href="{{url('/')}}">home</a></li>
				<li><a href="{{url('/')}}/menu">Menu</a></li>
				<li>Food Basket</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->

<!-- Checkout Page -->
<div class="checkout-page">
    <div class="auto-container">

        <!--Default Links-->
        {{-- <ul class="default-links">
            <li>Returning customer? <a href="account.html" data-toggle="modal" data-target="#schedule-box">Click here to login</a></li>
        </ul> --}}

        <!--Billing Details-->
        <div class="billing-details">
            <div class="shop-form">
                <form method="post" action="https://codexlayer.com/html/comida_punto/checkout.html">
                    <div class="row clearfix">
                        <div class="col-lg-7 col-md-12 col-sm-12">

                            <div class="sec-title"><h2>Billing Details</h2></div>
                            <div class="billing-inner">
                                <div class="row clearfix">

                                    <!--Form Group-->
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <div class="field-label">Name <sup>*</sup></div>
                                        <input type="text" name="name" value="{{Auth::User()->name}}" >
                                    </div>

                                    <!--Form Group-->
                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                    <div class="field-label">Email <sup>*</sup></div>
                                    <input type="text" name="email" value="{{Auth::User()->email}}">
                                    </div>



                                    <!--Form Group-->
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Address <sup>*</sup></div>
                                        <input type="email" name="field-name" value="{{Auth::User()->address}}" placeholder="Apartment, Suit unit etc (optional)">
                                    </div>

                                    <!--Form Group-->
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Mobile<sup>*</sup></div>
                                        <input type="text" name="field-name" value="{{Auth::User()->mobile}}" placeholder="254723014032">
                                    </div>



                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Order Notes</div>
                                        <textarea placeholder="Note about your order. e.g. special note for delivery">{{Auth::User()->notes}}</textarea>
                                    </div>

                                    <button type="button" class=" btn-style-two"><span class="txt fa fa-pencil"> Update</span></button>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5 col-md-12 col-sm-12">
                            <div class="sec-title"><h2>Your Order</h2></div>
                            <div class="shop-order-box">
                                <ul class="order-list">
                                    <li>Product<span>TOTAL</span></li>
                                    <?php $cartItems = \Cart::getContent(); ?>
                                    @foreach ($cartItems as $cartitems)
                                    <li style="color:#000000">{{$cartitems->name}}<span>KES {{$cartitems->price}}</span></li>
                                    <hr>
                                    @endforeach
                                    <li>Subtotal<span class="dark">KES {{\Cart::getSubTotal()}}</span></li>
                                    <li>Shipping And Handling<span>Free Shipping</span></li>
                                    <li class="total">TOTAL<span class="dark"><?php $Shipping = 100; $Total = \Cart::getTotal(); ?>
                                        KES {{$Total+$Shipping}}</span></li>
                                </ul>


                                <!--Place Order-->
                                <div class="place-order">
                                    <!--Payment Options-->
                                    <div class="payment-options">
                                        <ul>
                                            <li>
                                                <div class="radio-option">
                                                    <input type="radio" name="payment-group" id="payment-2" checked>
                                                    <label for="payment-2"><strong>M-PESA Express</strong>
                                                        <span class="small-text">
                                                            <input type="text" name="verify" placeholder="Enter Your M-PESA Number 254723000000">
                                                            <br>
                                                            <button type="button" class=" btn-style-two"><span class="txt">Pay Now</span></button>
                                                        </span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="radio-option">
                                                    <input type="radio" name="payment-group" id="payment-1">
                                                    <label for="payment-1"><strong>M-PESA</strong>
                                                        <span class="small-text">
                                                          <ol style="color:#000000">
                                                            <li>1. Go To M-PESA</li>
                                                            <li>2. Select Lipa Na M-PESA</li>
                                                            <li>3. Buy Goods</li>
                                                            <li>4. Enter Till Number 942527</li>
                                                            <li>5. Enter Amount {{$Total+$Shipping}}</li>
                                                            <li>6. Enter your PIN to confirm</li>
                                                          </ol>
                                                          <input type="text" name="verify" placeholder="Enter Transaction Code">
                                                          <br>
                                                            <button type="button" class=" btn-style-two"><span class="txt">Verify Payment</span></button>
                                                        </span>
                                                    </label>
                                                </div>
                                            </li>

                                            {{-- <li>
                                                <div class="radio-option">
                                                    <input type="radio" name="payment-group" id="payment-3">
                                                    <label for="payment-3"><strong>Paypal</strong>
                                                        <img src="{{asset('theme/images/resource/paypall.jpg')}}" alt="Shaq's House Lipa Na M-PESA" />
                                                        <a href="https://paypal.com" class="what-paypall">What is PayPal?</a></label>
                                                </div>
                                            </li> --}}
                                        </ul>
                                    </div>



                                </div>
                                <!--End Place Order-->

                            </div>


                        </div>
                    </div>
                </form>

            </div>

        </div><!--End Billing Details-->
    </div>
</div>

@include('front.instagram')
@endsection
