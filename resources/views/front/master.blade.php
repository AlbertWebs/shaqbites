<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>Shaqs House Restaurant | Pilau, Biryani, Nyama Choma, Burgers</title>
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<!-- Stylesheets -->
<link href="{{asset('theme/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('theme/css/style.css')}}" rel="stylesheet">
<link href="{{asset('theme/css/responsive.css')}}" rel="stylesheet">

<link href="{{asset('theme/fonts.googleapis.com/css2f1f3.css?family=Kaushan+Script&amp;family=Lato:wght@100;300;400;700;900&amp;family=Playfair+Display:wght@400;500;600;700;800;900&amp;display=swap')}}" rel="stylesheet">

@include('favicon')
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/62b9a3dfb0d10b6f3e7981d9/1g6iig8kr';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->

<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js')}}"></script><![endif]-->
<!--[if lt IE 9]><script src="{{asset('theme/js/respond.js')}}"></script><![endif]-->
</head>

<body class="hidden-bar-wrapper">

<div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

 	<!-- Main Header-->
    <header class="main-header header-style-one">

		<!-- Header Top -->
        <div class="header-top">
            <div class="outer-container">
                <div class="clearfix">

					<!-- Top Left -->
                    <div class="top-left pull-right">
						<!-- Social Box -->
						<ul class="social-box">
							<li class="follow">Follow Us On</li>
							<li><a href="https://www.facebook.com/shaqshousefoodss" class="fa fa-facebook-f"></a></li>
							<li><a href="https://twitter.com/shaq_house" class="fa fa-twitter"></a></li>
							<li><a href="https://www.instagram.com/shaqshousefoods" class="fa fa-instagram"></a></li>
							<li><a href="https://www.linkedin.com/company/shaqs-house/" class="fa fa-linkedin"></a></li>
						</ul>
                    </div>

					<!-- Top Right -->
					<div class="top-right">
						<!-- Info List -->
						<ul class="info-list">
							<li><a href="tel:+254723014032"><span class="icon flaticon-phone-call"></span> (+254) 070 678 8440</a></li>
							<li><a href="mailto:chomazone@shaqshouse.co.ke"><span class="icon flaticon-email"></span> info@shaqshouse.co.ke</a></li>
							<li><a href="coptact.html"><span class="icon flaticon-placeholder"></span> Kettle House Bar,   Lavington, Muthangari Road, off Gitanga Rd, Nairobi</a></li>
						</ul>
					</div>

                </div>
            </div>
        </div>

		<!--Header-Upper-->
        <div class="header-upper">
        	<div class="outer-container clearfix">

				<div class="pull-left logo-box">
					<div class="logo"><a href="{{url('/')}}"><img width="120" src="{{asset('uploads/logo/logo.png')}}" alt="" title=""></a></div>
				</div>

				<div class="nav-outer clearfix">
					<!--Mobile Navigation Toggler-->
					<div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
					<!-- Main Menu -->
					<nav class="main-menu navbar-expand-md">
						<div class="navbar-header">
							<!-- Toggle Button -->
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>

						<div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
							<ul class="navigation clearfix">
								{{-- <li class="current dropdown"><a href="{{url('/')}}/menu">Menu</a>

								</li> --}}
                                <?php
                                   $Category = DB::table('category')->limit('7')->get();
                                ?>
                                @foreach ($Category as $cat)
                                <li><a href="{{url('/')}}/menu/{{$cat->slung}}">{{$cat->cat}}</a>

								</li>
                                @endforeach


							</ul>
						</div>
					</nav>
					<!-- Main Menu End-->

					<!-- Outer Box -->
					<div class="outer-box clearfix">

						<!-- Search Btn -->
						<div class="search-box-btn search-box-outer"><span class="icon fa fa-search"></span></div>

						<!-- Login Box -->
						<div class="login-box">
							<a href="{{url('/')}}/dashboard" class="flaticon-user-1"></a>
						</div>

						<!-- Cart Box -->
						<div class="cart-box">
							<div class="dropdown">
								<button class="cart-box-btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flaticon-shopping-cart-1"></span><span class="total-cart">{{ \Cart::getTotalQuantity()}}
                                </span></button>
								<div class="dropdown-menu pull-right cart-panel" aria-labelledby="dropdownMenu1">
                                    <?php $cartItems = \Cart::getContent(); ?>
                                    @foreach ($cartItems as $cartitems)
									<div class="cart-product">
										<div class="inner">
											<div class="cross-icon"><span class="icon fa fa-remove"></span></div>
											<div class="image"><img src="{{asset('theme/images/resource/menu-1.jpg')}}" alt="" /></div>
											<h3><a href="#">{{$cartitems->name}}</a></h3>
											<div class="quantity-text">Quantity {{$cartitems->quantity}}</div>
											<div class="price">KES {{$cartitems->price}}</div>
										</div>
									</div>
                                    @endforeach

									<div class="cart-total">Sub Total: <span>KES {{\Cart::getSubTotal();}}</span></div>
									<ul class="btns-boxed">
										<li><a href="{{url('/')}}/shopping-cart">View Cart</a></li>
										<li><a href="{{url('/')}}/shopping-cart/checkout">CheckOut</a></li>
									</ul>

								</div>
							</div>
						</div>

						<!-- Delivery Box -->
						<div class="delivery-box">
							<div class="box-inner">
								<span class="icon flaticon-delivery"></span>
								Order & Get Free Delivery<br>
								<a href="tel:+254706788440">(+254) 070 678 8440</a>
							</div>
						</div>
						<!-- End Delivery Box -->

					</div>
					<!-- End Outer Box -->

				</div>

            </div>
        </div>
        <!--End Header Upper-->

		<!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="auto-container clearfix">
                <!--Logo-->
                <div class="logo pull-left">
                    <a href="{{url('/')}}" title=""><img width="150" src="{{asset('uploads/logo/logo.png')}}" alt="" title=""></a>
                </div>
                <!--Right Col-->
                <div class="pull-right">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav><!-- Main Menu End-->

					<!-- Main Menu End-->
					<div class="outer-box clearfix">

						<!-- Search Btn -->
						<div class="search-box-btn search-box-outer"><span class="icon fa fa-search"></span></div>

						<!-- Login Box -->
						<div class="login-box">
							<a href="{{url('/')}}/dashboard" class="flaticon-user-1"></a>
						</div>

						<!-- Cart Box -->
						<div class="cart-box">
                            <div class="dropdown">
								<button class="cart-box-btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flaticon-shopping-cart-1"></span><span class="total-cart">{{ \Cart::getTotalQuantity()}}
                                </span></button>
								<div class="dropdown-menu pull-right cart-panel" aria-labelledby="dropdownMenu1">
                                    <?php $cartItems = \Cart::getContent(); ?>
                                    @foreach ($cartItems as $cartitems)
									<div class="cart-product">
										<div class="inner">
											<div class="cross-icon"><span class="icon fa fa-remove"></span></div>
											<div class="image"><img src="{{asset('theme/images/resource/menu-1.jpg')}}" alt="" /></div>
											<h3><a href="#">{{$cartitems->name}}</a></h3>
											<div class="quantity-text">Quantity {{$cartitems->quantity}}</div>
											<div class="price">KES {{$cartitems->price}}</div>
										</div>
									</div>
                                    @endforeach

									<div class="cart-total">Sub Total: <span>KES {{\Cart::getSubTotal();}}</span></div>
									<ul class="btns-boxed">
										<li><a href="{{url('/')}}/shopping-cart">View Cart</a></li>
										<li><a href="{{url('/')}}/shopping-cart/checkout">CheckOut</a></li>
									</ul>

								</div>
							</div>
						</div>

					</div>

                </div>
            </div>
        </div><!-- End Sticky Menu -->

		<!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-multiply"></span></div>

            <nav class="menu-box">
                <div class="nav-logo"><a href="{{url('/')}}"><img width=200 src="{{asset('uploads/logo/logo.png')}}" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            </nav>
        </div><!-- End Mobile Menu -->

    </header>
    <!-- End Main Header -->

@yield('content')

	<!-- Main Footer -->
    <footer class="main-footer" style="background-image: url('{{asset('theme/images/background/pattern-1.png')}}')">
		<div class="auto-container">
        	<!--Widgets Section-->
            <div class="widgets-section">
            	<div class="row clearfix">

                    <!-- Big Column -->
                    <div class="big-column col-lg-12 col-md-12 col-sm-12 text-center">
						<div class="row clearfix">

                        	<!-- Footer Column -->
                            <div class="footer-column col-lg-12 col-md-6 col-sm-12">
                                <div class="footer-widget logo-widget">

									<ul class="social-box">
										<li class="connect">We are Social Connect With Us</li>
										<li class="facebook"><a href="https://www.facebook.com/shaqshousefoods" class="fa fa-facebook-f"></a></li>
										<li class="twitter"><a href="https://twitter.com/shaq_house" class="fa fa-twitter"></a></li>
										<li class="linkedin"><a href="https://www.linkedin.com/company/shaqs-house/" class="fa fa-linkedin"></a></li>
										<li class="instagram"><a href="https://www.instagram.com/shaqshousefoods/" class="fa fa-instagram"></a></li>
									</ul>
								</div>
							</div>

                            {{--  --}}
                            <!-- Footer Column -->
                            <div class="footer-column col-lg-12 col-md-6 col-sm-12">
                                <div class="footer-widget logo-widget">

									<ul class="social-boxs">
										<li style="color:#ffffff !important">
                                            <a style="color:#ffffff !important" href="{{url('/')}}/terms-and-conditions"> Terms and Conditions</a>
                                             <strong> • </strong>
                                            <a style="color:#ffffff !important" href="{{url('/')}}/privacy-policy"> Privacy Policy</a>
                                            <strong> • </strong>
                                            <a style="color:#ffffff !important" href="{{url('/')}}/delivery-policy"> Delivery Policy</a>
                                            <strong> • </strong>
                                            <a style="color:#ffffff !important" href="{{url('/')}}/copyright-statement"> Copyright Statement</a>
                                        </li>

									</ul>
								</div>
							</div>



						</div>
					</div>



				</div>
			</div>
		</div>
		<!-- Footer Bottom -->
		<div class="footer-bottom">
			<div class="auto-container">
				<div class="copyright">Copyright © {{date('Y')}} <a href="#">Shaq's Choma Zone</a> by <a href="https://venshaq.com">Venshaqs Holdings Limited</a>. All Rights Reserved.</div>
			</div>
		</div>
	</footer>
	<!-- End Main Footer -->

</div>
<!-- End pagewrapper -->

<!-- Search Popup -->
<div class="search-popup">
	<button class="close-search style-two"><span class="flaticon-multiply"></span></button>
	<button class="close-search"><span class="flaticon-multiply"></span></button>
	<form method="post" action="#">
		<div class="form-group">
			<input type="search" name="search-field" value="" placeholder="Search your meal here......" required="">
			<button type="submit"><i class="fa fa-search"></i></button>
		</div>
	</form>
</div>
<!-- End Header Search -->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-up"></span></div>

<script src="{{asset('theme/js/jquery.js')}}"></script>
<script src="{{asset('theme/js/popper.min.js')}}"></script>
<script src="{{asset('theme/js/bootstrap.min.js')}}"></script>
<script src="{{asset('theme/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('theme/js/jquery.fancybox.js')}}"></script>
<script src="{{asset('theme/js/appear.js')}}"></script>
<script src="{{asset('theme/js/parallax.min.js')}}"></script>
<script src="{{asset('theme/js/tilt.jquery.min.js')}}"></script>
<script src="{{asset('theme/js/jquery.paroller.min.js')}}"></script>
<script src="{{asset('theme/js/owl.js')}}"></script>
<script src="{{asset('theme/js/wow.js')}}"></script>
<script src="{{asset('theme/js/jquery.bootstrap-touchspin.js')}}"></script>
<script src="{{asset('theme/js/nav-tool.js')}}"></script>
<script src="{{asset('theme/js/jquery-ui.js')}}"></script>
<script src="{{asset('theme/js/script.js')}}"></script>





</body>

</html>
