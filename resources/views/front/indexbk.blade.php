@extends('front.master')

@section('content')
	<!-- Banner Section -->
    <section class="banner-section">
		<div class="main-slider-carousel owl-carousel owl-theme">

            <div class="slide" style="background-image: url('{{asset('theme/images/main-slider/image-1.jpg')}}')">
				<div class="auto-container">
					<!-- Content Column -->
					<div class="content-column">
						<div class="inner-column">
							<div class="title">Delicious Food For The Last 2 Decades</div>
							<h1>We Make <br> An <span>Excelllent</span> <br> Food</h1>
							<div class="btns-box">
								<a href="{{url('/')}}/#" class="theme-btn btn-style-one"><span class="txt">Discover More</span></a>
								<a href="{{url('/')}}/menu" class="theme-btn btn-style-two"><span class="txt">Order Online</span></a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="slide" style="background-image: url('{{asset('theme/images/main-slider/image-4.jpg')}}')">
				<div class="auto-container">
					<!-- Content Column -->
					<div class="content-column">
						<div class="inner-column">
							<div class="title">Delicious Food For The Last 2 Decades</div>
							<h1>We Serve The <br> <span>Good Taste</span> Of <br> Food</h1>
							<div class="btns-box">
								<a href="{{url('/')}}/#" class="theme-btn btn-style-one"><span class="txt">Discover More</span></a>
								<a href="{{url('/')}}/menu" class="theme-btn btn-style-two"><span class="txt">Order Online</span></a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="slide" style="background-image: url('{{asset('theme/images/main-slider/image-5.jpg')}}')">
				<div class="auto-container">
					<!-- Content Column -->
					<div class="content-column centered">
						<div class="inner-column">
							<div class="title">Delicious Food For The Last 2 Decades</div>
							<h1>We Make <br> An <span>Excelllent</span> <br> Food</h1>
							<div class="btns-box">
								<a href="{{url('/')}}/#" class="theme-btn btn-style-one"><span class="txt">Discover More</span></a>
								<a href="{{url('/')}}/menu" class="theme-btn btn-style-two"><span class="txt">Order Online</span></a>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>
	<!-- End Banner Section -->

	<!-- Menu Section -->
	<section class="menu-section">
		<div class="auto-container">
			<div class="row clearfix">

                <?php $Category = DB::table('category')->limit(4)->get(); ?>
                @foreach($Category as $cat)
				<!-- Menu Block -->
				<div class="menu-block col-lg-3 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="image">
							<img class="menu-img" src="{{url('/')}}/uploads/categories/{{$cat->image}}" alt="{{$cat->cat}}" />
							<!-- Overlay Box -->
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="content">
										<h2><a href="{{url('/')}}/menu/{{$cat->slung}}">{{$cat->cat}}</a></h2>
										<a href="{{url('/')}}/menu/{{$cat->slung}}" class="view">View Menu</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
                @endforeach



			</div>
		</div>
	</section>
	<!-- End Menu Section -->

	<!-- Services Section -->
	<section class="services-section">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<div class="title">Placing Order</div>
				<h2>How it Works</h2>
			</div>
			<div class="row clearfix">

				<!-- Service Block -->
				<div class="service-block col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
						<span class="icon flaticon-alarm-clock"></span>
						<h4><a href="{{url('/')}}/menu">Browse Menu</a></h4>
						<div class="text">Browse your Menu and Select Your Picks</div>
					</div>
				</div>

				<!-- Service Block -->
				<div class="service-block col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
						<div class="icon flaticon-check"></div>
						<h4><a href="#">Checkout and Make Payment</a></h4>
						<div class="text">Confirm your order and make payment</div>
					</div>
				</div>

				<!-- Service Block -->
				<div class="service-block col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
						<div class="icon flaticon-delivery"></div>
						<h4><a href="#">Sit Back and Relax</a></h4>
						<div class="text">Your order will be dispatched in 10-15 Minutes</div>
					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- End Services Section -->

	<!-- Welcome Section -->
	<section class="welcome-section">
		<div class="auto-container">
			<div class="row clearfix">
				<!-- Image Column -->
				<div class="image-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="image">
							<img src="{{asset('theme/images/resource/meat-g2f89dc240_1280.jpg')}}" alt="" />
						</div>
					</div>
				</div>
				<!-- Content Column -->
				<div class="content-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="sec-title">
							<div class="title">Freshly made. Quickly delivered</div>
							<h2>Welcome To Shaq's House</h2>
							<div class="text">Shaq's House Servers you with tasty fried Mbuzi and a wide range of other menu items including hand-cut chips freshly made daily, chicken burgers, slow roasted rotisserie chicken, beef burgers , Spicy Wings, Chicken Bites and other affordable friendly meals. Among others, Our Best Menus are based on </div>
						</div>
						<ul class="list-style-one">
							<li>Goat Meat(Mbuzi Fry, Mbuzi Choma , Mbuzi Matumbo)</li>
							<li>Chicken(Kuku Kienyeji, kuku Broiler, Chicken Nuggets, Chicken Burger)</li>
							<li>Beef(Nyama Choma, Matumbo, Beef Fry, Beef Soup, Beef Burger, Samosa)</li>
							<li>Sheep Meet(Kondoo ingine hapo safi sana hata huwezi imagine Kondoo inaweza kua tamu ivo) </li>
						</ul>
						<div class="author-box">
							<div class="box-inner">
								<div class="author-image">
									<img src="{{asset('theme/images/resource/author-1.jpg')}}" alt="" />
								</div>
								<div class="signature"><img src="{{asset('theme/images/icons/signature.png')}}" alt="" /></div>
								<h5>Mike Ochieng</h5>
								<div class="designation">Master Chef</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Welcome Section -->

	<!-- Trending Section -->
	<section class="trending-section" style="background-image: url('{{asset('theme/images/background/4.jpg')}}')">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title light centered">
				<div class="title">Trending</div>
				<h2>Our Customers' Top Picks</h2>
			</div>
			<div class="row clearfix">
                <?php $Menu = DB::table('menus')->limit('6')->get() ?>

                @foreach ($Menu as $menu)
				<!-- Menu Block Two -->
				<div class="menu-block-two col-lg-6 col-md-12 col-sm-12">
					<div class="inner-box">
						<div class="content">
							<div class="menu-image">
								<a href="{{url('/')}}/menu/{{$menu->slung}}"><img src="{{asset('uploads/menu/')}}/{{$menu->thumbnail}}" alt="" /></a>
							</div>
							<div class="price">KES {{$menu->price}}</div>
							<h4><a href="{{url('/')}}/menu/{{$menu->slung}}">{{$menu->title}}</a></h4>
							<div class="text">{{$menu->meta}}</div>
							<a href="{{url('/')}}/shopping-cart/add-to-cart/{{$menu->id}}" class="cart-btn theme-btn">Add To Basket</a>
						</div>
					</div>
				</div>
                @endforeach
			</div>

			<!-- Button Box -->
			<div class="btn-box text-center">
				<a href="{{url('/')}}/menu" class="theme-btn btn-style-two"><span class="txt">View Full Menu</span></a>
			</div>

		</div>
	</section>
	<!-- End Trending Section -->

	<!-- Menu Pricing Section -->
	<section class="menu-pricing-section">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<div class="title">Our Menu</div>
				<h2>Enjoy Shaq's Zone Specialties</h2>
			</div>

			<!-- Menu Info Tabs -->
			<div class="menu-info-tabs">
				<div class="menu-tabs tabs-box">

					<!--Tab Btns-->
					<ul class="tab-btns tab-buttons clearfix">
                        <?php
                          $Cat = DB::table('category')->get();
                          $Counter = 1;
                        ?>
                        @foreach ($Cat as $cat)
                        <li data-tab="#menu_{{$cat->id}}" class="tab-btn @if($Counter==1) active-btn @endif">{{$cat->cat}}</li>
                        <?php $Counter = $Counter+1 ?>
                        @endforeach

						{{-- <li data-tab="#menu-dinner" class="tab-btn">Dinner</li>
						<li data-tab="#menu-hour" class="tab-btn">Happy Hour</li>
						<li data-tab="#menu-beverages" class="tab-btn">Beverages</li>
						<li data-tab="#menu-deserts" class="tab-btn">Deserts</li> --}}
					</ul>

					<!--Tabs Container-->
					<div class="tabs-content">

                        <?php $Counter = 1; ?>
                        @foreach ($Cat as $cat)
                        <!-- Tab / Active Tab -->
                        <div class="tab @if($Counter==1) active-tab @endif" id="menu_{{$cat->id}}">
                            <div class="content">
                                <div class="row clearfix">
                                    <?php $Menu = DB::table('menus')->where('cat_id',$cat->id)->get() ?>

                                    @foreach ($Menu as $menu)
                                    <!-- Menu Block Three -->
                                    <div class="menu-block-three col-lg-6 col-md-12 col-sm-12">
                                        <div class="inner-box">
                                            <div class="upper-box clearfix">
                                                <div class="pull-left">
                                                    <h6><a href="{{url('/')}}/menu/{{$menu->slung}}">{{$menu->title}}</a></h6>
                                                </div>
                                                <div class="pull-right">
                                                    <div class="price">KES {{$menu->price}}</div>
                                                </div>
                                            </div>
                                            <div class="text">{{$menu->meta}}</div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>

                                <!-- Button Box -->
                                <div class="btn-box text-center">
                                    <a href="{{url('/')}}/menu" class="theme-btn btn-style-three"><span class="txt">View All Products</span></a>
                                </div>

                            </div>
                        </div>
                        <?php $Counter = $Counter+1 ?>
                        @endforeach




					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Menu Pricing Section -->
    <!-- Order Section -->
	{{-- <section class="order-section margin-top">
		<div class="auto-container">
			<div class="inner-container" style="background-image: url('{{asset('theme/images/background/3.jpg')}}')">
				<div class="clearfix">
					<div class="content-box pull-left">
						<div class="title">Order Line</div>
						<h3><a href="{{url('/')}}/menu">Get 10% Off Your First Order</a></h3>
						<div class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has <br> been the industry's standard dummy text ever since the 1500s</div>
					</div>
					<div class="pull-right">
						<!-- Button Box -->
						<div class="btn-box text-right">
							<a href="{{url('/')}}/menu" class="theme-btn btn-style-two"><span class="txt">Order Now</span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> --}}
	<!-- End Order Section -->





    {{-- @include('front.testimonials') --}}
    <section class="testimonial-section">
		<div class="auto-container">
        </div>
    </section>

    {{-- @include('front.blog') --}}

	<!-- Reservation Section -->
	<section class="reservation-section team-section" >
		<div class="auto-container">
			<div class="row clearfix">
				<!-- Form Column -->
				<div class="form-column col-lg-8 col-md-12 col-sm-12">
					<div class="inner-column">
						<!-- Sec Title -->
						<div class="sec-title">
							<div class="title">Reservation</div>
							<h2>Book Your Slot</h2>
						</div>

						<!-- Default Form -->
						<div class="default-form">
							<form method="post" action="https://codexlayer.com/html/comida_punto/{{url('/')}}/menu">
								<div class="row clearfix">

									<!-- Form Group -->
									<div class="form-group col-lg-6 col-md-6 col-sm-12">
										<input type="text" name="username" placeholder="Name" required="">
									</div>

									<!-- Form Group -->
									<div class="form-group col-lg-6 col-md-6 col-sm-12">
										<input type="email" name="email" placeholder="Email" required="">
									</div>

									<!-- Form Group -->
									<div class="form-group col-lg-6 col-md-6 col-sm-12">
										<input type="text" name="phone" placeholder="Phone" required="">
									</div>
                                    <!-- Form Group -->
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <input type="text" name="seats" placeholder="Seats" required="">
                                    </div>
									<!-- Form Group -->
									<div class="form-group col-lg-6 col-md-6 col-sm-12">
										<input type="time" name="time" required="">
									</div>



									<!-- Form Group -->
									<div class="form-group col-lg-6 col-md-6 col-sm-12">
										<input type="date" name="date" required="">
									</div>

									<!-- Form Group -->
									<div class="form-group col-lg-12 col-md-12 col-sm-12">
										<textarea name="message" placeholder="To Be Delivered *"></textarea>
									</div>

									<!-- Form Group -->
									<div class="form-group col-lg-6 col-md-6 col-sm-12">
										<button class="theme-btn btn-style-three" type="submit" name="submit-form"><span class="txt">Book Now</span></button>
									</div>

								</div>
							</form>
						</div>

					</div>
				</div>

				<!-- Info Column -->
				<div class="info-column col-lg-4 col-md-12 col-sm-12">
					<div class="inner-column" style="background-image: url('{{asset('theme/images/background/reserve-info.jpg')}}')">
						<!-- Sec Title -->
						<div class="sec-title light centered">
							<div class="title">Reservations</div>
							<h2>Book Your Slot</h2>
						</div>
						<ul class="table-list">
							<li>Mon - Fri<span>07:00AM - 9:00PM</span></li>
							{{-- <li>Sat<span>09:00AM - 7:00pm</span></li> --}}
							<li>Public Holidays<span>Closed</span></li>
							<li>Sat - Sun<span>09:00AM - 7:00pm</span></li>
						</ul>
						<div class="btn-box text-center">
							<a class="phone" href="tel:+254 072 301 4032">+254 072 301 4032</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- End Reservation Section -->

@include('front.instagram')
@endsection
