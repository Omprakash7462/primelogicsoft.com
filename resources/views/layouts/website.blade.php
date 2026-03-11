<!DOCTYPE html>
<html lang="en">
<head>	
    <!-- PAGE TITLE HERE ============================================= -->
	<title>{{ config('app.name') }} -  @yield('title')</title>
    <!-- FAVICONS ICON ============================================= -->
	<link rel="icon" href="{{ asset('assets/images/favicon.png?v=1') }}" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png?v=1') }}" />
	<link rel="canonical" href="{{ url()->current() }}"/>
	<!-- META ============================================= -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- OG -->
	<meta name="robots" content="index, follow">
	<meta name="title" content="@yield('meta_title')"/>
	<meta name="description" content="@yield('meta_description')"/>
	<meta name="keywords" content=" @yield('meta_keywords')"/>
	<meta property="og:url" content="https://primelogicsoft.com/"/>
	<meta property="og:site_name" content="{{ config('app.name') }}"/>
	<meta property="og:type" content="website"/>
	<meta property="og:locale" content="en_us"/>
	<meta property="og:title" content="@yield('meta_title')" />
	<meta property="og:description" content="@yield('meta_description')"/>
	<meta property="og:image" content="{{ asset('assets/images/favicon.png?v=1') }}"/>
	
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('assets/fonts/font.css') }}">
	<!-- All PLUGINS CSS ============================================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap-select/css/bootstrap-select.min.css?v=6') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/swiper/swiper.min.css?v=6') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css?v=14') }}">
</head>
<body>
<div class="page-wraper">
	<div id="loading-icon-bx">
		<div class="loading-inner">
			<div class="load-one"></div>
			<div class="load-two"></div>
			<div class="load-three"></div>
		</div>
	</div>

	<!-- header -->
	<header class="header header-transparent rs-nav">
		<!-- main header -->
		<div class="sticky-header navbar-expand-lg">
			<div class="menu-bar clearfix">
				<div class="container-fluid clearfix">
					<!-- website logo -->
					<div class="menu-logo logo-dark">
						<a href="{{ route('index') }}">
                            <img src="{{ asset('assets/images/logo-final-new.png') }}" alt="{{ config('app.name') }}">
                        </a>
					</div>
					<!-- nav toggle button -->
					<button class="navbar-toggler collapsed menuicon justify-content-end" type="button" data-bs-toggle="collapse" data-bs-target="#menuDropdown" aria-controls="menuDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
					<!-- extra nav -->
					<div class="secondary-menu">
						<ul>
							{{-- <li class="search-btn"><button id="quikSearchBtn" type="button" class="btn-link"><i class="las la-search"></i></button></li>
							<li class="num-bx"><a href="tel:(+01)999888777"><i class="fas fa-phone-alt"></i> (+01) 999 888 777</a></li> --}}
							<li class="btn-area"><a href="mailto:info@primelogicsoft.com" class="btn btn-primary shadow"><i class="fas fa-envelope"></i> Email US <i class="btn-icon-bx fas fa-chevron-right"></i></a></li>
						</ul>
					</div>
					<!-- Search Box ==== -->
                    <div class="nav-search-bar">
                        <form action="#">
                            <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                            <span><i class="ti-search"></i></span>
                        </form>
						<span id="searchRemove"><i class="ti-close"></i></span>
                    </div>
					<div class="menu-links navbar-collapse collapse justify-content-end" id="menuDropdown">
						<div class="menu-logo">
							<a href="{{ route('index') }}"><img src="{{ asset('assets/images/logo-final-new.png') }}" alt=""></a>
						</div>
						<ul class="nav navbar-nav">	
							<li @if(Route::is('index')) class="active" @endif><a href="{{ route('index') }}">Home</a></li>
							<li @if(Route::is('about.us')) class="active" @endif><a href="{{ route('about.us') }}">About Us</a></li>
							<li @if(Route::is('products') || Route::is('products.details')) class="active" @endif><a href="{{ route('products') }}">Products</a></li>
							<li @if(Route::is('services') || Route::is('services.details')) class="active" @endif><a href="{{ route('services') }}">Services</a></li>
							<li @if(Route::is('blogs')) class="active" @endif><a href="{{ route('blogs') }}">Blogs</a></li>							
							<li @if(Route::is('contact.us')) class="active" @endif><a href="{{ route('contact.us') }}">Contact Us</a></li>
						</ul>
						<ul class="social-media">
							<li><a target="_blank" href="https://www.facebook.com/" class="btn btn-primary"><i class="fab fa-facebook-f"></i></a></li>
							<li><a target="_blank" href="https://www.google.com/" class="btn btn-primary"><i class="fab fa-google"></i></a></li>
							<li><a target="_blank" href="https://www.linkedin.com/" class="btn btn-primary"><i class="fab fa-linkedin-in"></i></a></li>
							<li><a target="_blank" href="https://twitter.com/" class="btn btn-primary"><i class="fab fa-twitter"></i></a></li>
						</ul>
						<div class="menu-close">
							<i class="ti-close"></i>
						</div>
					</div>
					<!-- Navigation Menu END ==== -->
				</div>
			</div>
		</div>
		<!-- main header END -->
	</header>
	<!-- header END -->
 
    @yield('content')
	
	<!-- Footer ==== -->
	<footer class="footer" style="background-image:url({{ asset('assets/images/background/footer.jpg') }});">
		<!-- Footer Top -->
		<div class="footer-top">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-6 col-lg-6 col-md-6">
						<div class="widget widget_info">
							<div class="footer-logo">
								<a href="{{ route('index') }}"><img src="{{ asset('assets/images/logo-final-new.png') }}" alt=""></a>
							</div>
							<div class="ft-contact">
								<p>Primelogicsoft is a forward-thinking IT development company dedicated to building scalable, secure, and high-performance digital solutions. We specialize in transforming ideas into powerful software products that help businesses grow, automate processes, and stay ahead in the digital era.</p>
								<div class="contact-bx">
									<div class="icon"><i class="fas fa-envelope"></i></div>
									<div class="contact-number">
										<span>Email Us</span>
										<h4 class="number">info@primelogicsoft.com</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-6">
						<div class="widget footer_widget ml-50">
							<h3 class="footer-title">Quick Links</h3>
							<ul>
								<li><a href="{{ route('index') }}"><span>Home</span></a></li>
								<li><a href="{{ route('about.us') }}"><span>About Us</span></a></li>
								<li><a href="{{ route('products') }}"><span>Products</span></a></li>								
								<li><a href="{{ route('services') }}"><span>Services</span></a></li>								
								<li><a href="{{ route('blogs') }}"><span>Blogs</span></a></li>
								<li><a href="{{ route('contact.us') }}"><span>Contact Us</span></a></li>
							</ul>
						</div>
					</div>					
					<div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="widget widget_form">
                            <h3 class="footer-title">Subcribe</h3>
							<form class="subscribe-form subscription-form mb-30" action="#" method="post">
								<div class="ajax-message"></div>
								<div class="input-group">
									<input name="email" required="required" class="form-control" placeholder="Email Address" type="email">
								</div>
								<button name="submit" value="Submit" type="submit" class="btn btn-secondary shadow w-100">Subscribe Now</button>	
							</form>
							<div class="footer-social-link">
								<ul>
									<li><a target="_blank" href="https://www.facebook.com/"><img src="{{ asset('assets/images/social/facebook.png') }}" alt=""/></a></li>
									<li><a target="_blank" href="https://twitter.com/"><img src="{{ asset('assets/images/social/twitter.png') }}" alt=""/></a></li>
									<li><a target="_blank" href="https://www.instagram.com/"><img src="{{ asset('assets/images/social/instagram.png') }}" alt=""/></a></li>
									<li><a target="_blank" href="https://www.linkedin.com/"><img src="{{ asset('assets/images/social/linkedin.png') }}" alt=""/></a></li>
								</ul>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
		<!-- footer bottom -->
		<div class="container">
			<div class="footer-bottom">
                <div class="row">
                    <div class="col-12 text-center">
						<p class="copyright-text">Copyright © {{ date('Y') }} Design & Developed by <a href="https://primelogicsoft.com/" target="_blank" class="text-secondary"> Prime Logic Soft</a></p>
					</div>
                </div>
            </div>
		</div>
		<!-- footer-shape -->
		<img class="pt-img1 animate-wave" src="{{ asset('assets/images/shap/wave-blue.png') }}" alt="">
		<img class="pt-img2 animate1" src="{{ asset('assets/images/shap/circle-dots.png') }}" alt="">
		<img class="pt-img3 animate-rotate" src="{{ asset('assets/images/shap/trangle-orange.png') }}" alt="">
		<img class="pt-img4 animate-wave" src="{{ asset('assets/images/shap/wave-blue.png') }}" alt="">
	</footer>
    <!-- Footer END ==== -->
	<button class="back-to-top fa fa-chevron-up"></button>
</div>
<!-- JAVASCRIPT FILES ========================================= -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper.min.js') }}"></script>
<script src="{{ asset('assets/vendor/magnific-popup/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('assets/vendor/counter/counterup.min.js') }}"></script>
<script src="{{ asset('assets/vendor/counter/waypoints-min.js') }}"></script>
<script src="{{ asset('assets/js/functions.js') }}"></script>
<script src="{{ asset('assets/js/contact.js') }}"></script>
</body>

</html>