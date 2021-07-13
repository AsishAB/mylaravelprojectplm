@auth
	@extends('commonview.app')
	@section('content')

		<!-- animate css -->
		<link rel="stylesheet"  href="{{ asset('css/animate.min.css') }}">
		<!-- bootstrap css -->
		<!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> -->
		<!-- font-awesome -->
		<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
		<!-- google font -->
		

		<!-- custom css -->
		<link rel="stylesheet" href="{{ asset('css/templatemo-style.css') }}">

	<div id="body1">
		<!-- start preloader -->
		<div class="preloader">
			<div class="sk-spinner sk-spinner-rotating-plane"></div>
    	 </div>
		<!-- end preloader -->
		<!-- start navigation -->
		
		<!-- end navigation -->
		<!-- start home -->
		<section id="home">
			<div class="overlay">
				<div class="container">
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10 wow fadeIn" data-wow-delay="0.3s">
							<h1 class="text-upper">Hello, {{Auth::user()->first_name}}</h1>
							<i class="fa fa-laptop fa-2x"></i>
							<h3 class="text-uppercase">Welcome to your account</h3>
						<p>You can view and manage your account by going to the profile section </p>
							<img src="images/software-img.png" class="img-responsive" alt="home img">
						</div>
						<div class="col-md-1"></div>
					</div>
				</div>
			</div>
		</section>
		<!-- end home -->
		<!-- start divider -->
		<section id="divider">
			<div class="container">
				<div class="row">
					<div class="col-md-4 wow fadeInUp templatemo-box" data-wow-delay="0.3s">
						<i class="fa fa-twitter"></i>
						<h3 class="text-uppercase">Twitter</h3>
						<p> </p>
					</div>
					<div class="col-md-4 wow fadeInUp templatemo-box" data-wow-delay="0.3s">
						<i class="fa fa-stack-overflow"></i>
						<h3 class="text-uppercase">Stack Overflow</h3>
						<p></p>
					</div>
					<div class="col-md-4 wow fadeInUp templatemo-box" data-wow-delay="0.3s">
						<i class="fa fa-github"></i>
						<h3 class="text-uppercase">Git Hub</h3>
						<p></p>
					</div>
					
					
				</div>
			</div>
		</section>
		<!-- end divider -->

		<!-- start feature -->
		<section id="feature">
			<div class="container">
				<div class="row">
					<div class="col-md-6 wow fadeInLeft" data-wow-delay="0.6s">
						<h2 class="text-uppercase">This is my Laravel Project</h2>
						<p></p>
						<p><span><i class="fa fa-mobile"></i></span></p>
						<p><i class="fa fa-code"></i></p>
					</div>
					<div class="col-md-6 wow fadeInRight" data-wow-delay="0.6s">
						<img src="images/software-img.png" class="img-responsive" alt="feature img">
					</div>
				</div>
			</div>
		</section>
		<!-- end feature -->

		<!-- start feature1 -->
		<section id="feature1">
			<div class="container">
				<div class="row">
					<div class="col-md-6 wow fadeInUp" data-wow-delay="0.6s">
						<img src="images/software-img.png" class="img-responsive" alt="feature img">
					</div>
					<div class="col-md-6 wow fadeInUp" data-wow-delay="0.6s">
						<h2 class="text-uppercase">More of My Software</h2>
						<p></p>
						<p><span><i class="fa fa-mobile"></i></span></p>
						<p><i class="fa fa-code"></i></p>
					</div>
				</div>
			</div>
		</section>
		<!-- end feature1 -->

		<!-- start pricing -->
		<section id="pricing">
			<div class="container">
				<div class="row">
					<div class="col-md-12 wow bounceIn">
						<h2 class="text-uppercase">Account Management</h2>
					</div>
					<div class="col-md-4 wow fadeIn" data-wow-delay="0.6s">
						<div class="pricing text-uppercase">
							<div class="pricing-title">
								<h4>Profile</h4>
								<p>Manage your details</p>
								<!-- <small class="text-lowercase">monthly</small> -->
							</div>
							<ul>
								<li>View your profile</li>
								<li>Edit details</li>
								<li>Delete Account</li>
								
							</ul>
							<a href="{{url('profile')}}" class="btn btn-primary text-uppercase">Go To profile</a>
						</div>
					</div>
					<div class="col-md-4 wow fadeIn" data-wow-delay="0.6s">
						<div class="pricing active text-uppercase">
							<div class="pricing-title">
								<h4>Messages</h4>
								<p>View your messages</p>
							</div>
							<ul>
								<li>View recently contacted messages</li>
								<li>Reply to each message</li>
								<li>Manage your messages</li>
								
							</ul>
							<a href="{{url('contactm')}}" class="btn btn-primary text-uppercase">Go to messages</a>
						</div>
					</div>
					<div class="col-md-4 wow fadeIn" data-wow-delay="0.6s">
						<div class="pricing text-uppercase">
							<div class="pricing-title">
								<h4>Notifications </h4>
								<p>View Notifications</p>
								<!-- <small class="text-lowercase">Go There</small> -->
							</div>
							<ul>
								<li>Read Notifications</li>
								<li>Manage Notifications</li>
								<li></li>
								<li></li>
							</ul>
							<a href="{{url('viewnotf')}}" class="btn btn-primary text-uppercase">Go to Notifications</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- end pricing -->

		<!-- start download -->
		<section id="download">
			<div class="container">
				<div class="row">
					<div class="col-md-6 wow fadeInLeft" data-wow-delay="0.6s">
						<h2 class="text-uppercase">This project will also be done using other languages</h2>
						<p> </p>
						<a class="btn btn-primary text-uppercase" href="https://github.com/AsishAB" target="_blank"><i class="fa fa-download"></i> Download</a>
					</div>
					<div class="col-md-6 wow fadeInRight" data-wow-delay="0.6s">
						<img src="images/software-img.png" class="img-responsive" alt="feature img">
					</div>
				</div>
			</div>
		</section>
		<!-- end download -->

		<!-- start contact -->
		<section id="contact">
			<div class="overlay">
				<div class="container">
					<div class="row">
						<div class="col-md-6 wow fadeInUp" data-wow-delay="0.6s">
							<h2 class="text-uppercase">Contact Us</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. </p>
							<address>
								<p><i class="fa fa-map-marker"></i>Jatni</p>
								<p><i class="fa fa-phone"></i>Can't Show</p>
								<p><i class="fa fa-envelope-o"></i> Can't Show</p>
							</address>
						</div>
						<div class="col-md-6 wow fadeInUp" data-wow-delay="0.6s">
							
							<!-- <div class="contact-form">
								
									<div class="col-md-6">
										
									</div>
									<div class="col-md-6">
										<a href="contact"><button class="btn btn-primary text-uppercase"><i class="fa fa-envelope"></i> Contact Us</button></a>
									</div>
									<div class="col-md-12">
										
									</div>
									<div class="col-md-12">
										
									</div>
									<div class="col-md-8">
										
									</div>
							
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- end contact -->

		<!-- start footer -->
		</div>
		<!-- end footer -->
        
		<script src="{{ asset('js/jquery.js') }}"></script>
		<!-- <script src="js/bootstrap.min.js"></script> -->
		<script src="{{ asset('js/wow.min.js') }}"></script>
		<script src="{{ asset('js/jquery.singlePageNav.min.js') }}"></script>
		<script src="{{ asset('js/custom.js') }}"></script>

        
		
@endsection
@endauth
@guest
	<script type="text/javascript">window.location="{{ url('login') }}"</script>
@endguest
