@extends('front.master')

@section('content')
	<!-- Page Title -->
    <!-- Page Title -->
    <section class="page-title" style="background-image: url('{{asset('theme/images/background/10.jpg')}}')">
    	<div class="auto-container">
			<h1>Hello {{Auth::user()->name}}</h1>
			<ul class="page-breadcrumb">
				<li><a href="{{url('/')}}">home</a></li>
				<li><a href="{{url('/')}}/menu">Menu</a></li>
				<li>My Account</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->

	<!-- Account Page Section -->
    <div class="account-page-section">
        <div class="auto-container">
            <!-- Account Info Tabs -->
			<div class="account-info-tabs">
				<div class="account-tabs tabs-box">

					<!--Tab Btns-->
					<ul class="tab-btns tab-buttons clearfix">
						<li data-tab="#account-dashboard" class="tab-btn active-btn">Dashboard</li>
						<li data-tab="#account-order" class="tab-btn">Orders</li>
						<li data-tab="#account-download" class="tab-btn">Download</li>
						<li data-tab="#account-address" class="tab-btn">Address</li>
						<li data-tab="#account-account" class="tab-btn">Account Details</li>
						<li data-tab="#account-logout" class="tab-btn">Logout</li>
					</ul>

					<!--Tabs Container-->
					<div class="tabs-content">

						<!-- Tab / Active Tab -->
						<div class="tab active-tab" id="account-dashboard">
							<div class="content">
								<div class="dashboard-content">
									<h4>Hello <span>{{Auth::user()->name}}</span> (not <span>{{Auth::user()->name}}</span>? <span><a href="{{url('/')}}/logout" data-tab="#account-logout" class="tab-btn">Logout</a></span>)</h4>
									<div class="dashboard-text">From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.</div>
								</div>
							</div>
						</div>

						<!-- Tab -->
						<div class="tab" id="account-order">
							<div class="content">
								<!-- Order Box -->
								<div class="account-order-box">
									<div class="total-order">No order has been made yet!</div>
									<a href="{{url('/')}}/menu" class="theme-btn btn-style-three"><span class="txt">Start Shopping</span></a>
								</div>
							</div>
						</div>

						<!-- Tab -->
						<div class="tab" id="account-download">
							<div class="content">
								<!-- Order Box -->
								<div class="account-order-box">
									<div class="total-order">No downloads available yet!</div>
									<a href="#" class="theme-btn btn-style-three"><span class="txt">Start Downloading</span></a>
								</div>
							</div>
						</div>

						<!-- Tab -->
						<div class="tab" id="account-address">
							<div class="content">
								<!-- Account Address Box -->
								<div class="account-address-box">
									<div class="row clearfix">
										<div class="column col-lg-6 col-md-6 col-sm-12">
											<h4><span class="icon flaticon-edit"></span>Billing Address</h4>
											<ul class="address-list">
												<li>{{Auth::User()->name}}</li>
												<li>Shaq's House</li>
												<li>Street address</li>
												<li>Town / City</li>
												<li>10001</li>
												<li>Åland Islands</li>
											</ul>
										</div>
										<div class="column col-lg-6 col-md-6 col-sm-12">
											<h4><span class="icon flaticon-edit"></span>Shipping Address</h4>
											<ul class="address-list">
												<li>You have not set up this type of address yet.</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Tab -->
						<div class="tab" id="account-account">
							<div class="content">
								<!-- Account Form -->
								<div class="account-form">
									<form method="post" action="https://codexlayer.com/html/comida_punto/contact.html">
										<div class="row clearfix">

											<!-- Form Group -->
											<div class="form-group col-lg-6 col-md-6 col-sm-12">
												<input value="{{Auth::User()->name}}" type="text" name="username" placeholder="First Name" required="">
											</div>





											<!-- Form Group -->
											<div class="form-group col-lg-6 col-md-12 col-sm-12">
												<input value="{{Auth::User()->email}}" type="email" name="email" placeholder="Email Address*" required="">
											</div>

											<!-- Form Group -->
											<div class="form-group col-lg-12 col-md-12 col-sm-12">
												<h4>Update Password</h4>
											</div>

											<!-- Form Group -->
											<div class="form-group col-lg-6 col-md-12 col-sm-12">
												<input type="password" name="password" placeholder="Current Password" required="">
											</div>

											<!-- Form Group -->
											<div class="form-group col-lg-6 col-md-6 col-sm-12">
												<input type="password" name="password" placeholder="New Password" required="">
											</div>

											<!-- Form Group -->
											<div class="form-group col-lg-6 col-md-6 col-sm-12">
												<input type="password" name="password" placeholder="Re-Type Password" required="">
											</div>

											<!-- Form Group -->
											<div class="form-group col-lg-6 col-md-6 col-sm-12">
												<button class="theme-btn btn-style-three" type="submit" name="submit-form"><span class="txt">Save Changes</span></button>
											</div>

										</div>
									</form>
								</div>
							</div>
						</div>

						<!-- Tab -->
						<div class="tab" id="account-logout">
							<div class="content">
								<a onclick="return confirm('Do you wish to Logout')" href="{{url('/logout')}}" class="theme-btn btn-style-three"><span class="txt">Log Out</span></a>
							</div>
						</div>


					</div>
				</div>
			</div>

    	</div>
    </div>
	<!-- End Account Page Section -->

@include('front.instagram')
@endsection
