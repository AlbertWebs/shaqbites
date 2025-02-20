@extends('front.master')

@section('content')
	<!-- Login Page Section -->
	<section class="login-page-section" style="background-image: url(images/background/pattern-11.png)">
		<div class="auto-container">
			<div class="inner-container">
				<!-- Sec Title -->
				<div class="sec-title centered">
					<div class="title">Login</div>
					<h2>Login Now</h2>
					{{-- <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nibh nulla, fermentum quis scelerisque quis.</div> --}}
				</div>

				<!-- Login Form -->
				<div class="styled-form">
					<form method="post" action="{{ route('login') }}">
                        @csrf
						<div class="form-group">
							{{-- <input type="text" name="email" value="" placeholder="Email Address" required> --}}
                            <input id="email" type="email" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						</div>

						<div class="form-group">
							<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						</div>

						<div class="form-group">
							<div class="clearfix">
								<div class="pull-left">
									<div class="check-box">
										<input type="checkbox" name="remember-password" id="type-1" {{ old('remember') ? 'checked' : '' }}>
										<label for="type-1">Remember password</label>
									</div>
								</div>
								<div class="pull-right">
									<a href="{{ route('password.request') }}" class="forgot">Lost my password?</a>
								</div>
							</div>
						</div>

						<div class="form-group text-center">
							<button type="submit" class="theme-btn btn-style-three"><span class="txt">Log In</span></button>
						</div>

						<div class="form-group">
							<div class="or">or</div>
						</div>

						<div class="form-group">
							<div class="btns-box">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <a class="social-btn facebook-btn" href="{{url('/')}}/facebook"><span class="social-icon fa fa-facebook-f"></span>Sign In with Facebook</a>
                                    </div>
                                    <div class="col-lg-6">
                                        <a class="social-btn google-btn" href="{{url('/')}}/google"><span class="social-icon fa fa-google"></span>Sign In with Google</a>
                                    </div>
                                </div>
							</div>
						</div>

						<div class="form-group">
							<div class="users">Not a Member? <a href="{{ route('register') }}">Register Now</a></div>
						</div>

					</form>
				</div>

			</div>
		</div>
	</section>
	<!-- End Login Page Section -->

@include('front.instagram')
@endsection
