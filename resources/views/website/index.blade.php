@section('title', 'Prime Logic Soft | Web Development, Mobile Apps & Digital Marketing Company')
@section('meta_title', 'Prime Logic Soft | Web Development, Mobile Apps & Digital Marketing Company')
@section('meta_description', 'Prime Logic Soft provides professional website development, mobile app development, SaaS development, e-commerce solutions, and digital marketing services to help businesses grow with modern technology.')
@section('meta_keywords', 'Prime Logic Soft, web development company, mobile app development services, SaaS development company, e-commerce website development, digital marketing agency, custom software development')
@extends('layouts.website')
@section('content')
<div class="page-content bg-white">
		
	<!-- Main Banner -->
	<div class="main-banner" style="background-image:url({{ asset('assets/images/main-banner/bg1.jpg') }});">
		<div class="container-fluid inner-content">
			<div class="row align-items-center">
				<div class="col-lg-7 col-md-6 col-sm-7">
					<h6 class="title-ext text-primary">Transforming Ideas into Digital Reality</h6>
					<h1>We Build Smart & Scalable Digital Solutions</h1>
					<p>At PrimeLogicSoft, we design and develop innovative web and software solutions tailored to your business needs. From custom applications to enterprise systems, our expert team delivers scalable, secure, and high-performance digital products that drive growth and success.</p>
					<a href="{{ route('about.us') }}" class="btn btn-secondary btn-lg shadow">Read More</a>
				</div>
				<div class="col-lg-5 col-md-6 col-sm-5">
					<div class="banner-img">
						<img src="{{ asset('assets/images/main-banner/banner.png') }}" alt="">
					</div>
				</div>
			</div>
		</div>
		<img class="pt-img2 animate2" src="{{ asset('assets/images/shap/square-blue.png') }}" alt="">
		<img class="pt-img3 animate3" src="{{ asset('assets/images/shap/chicle-blue-2.png') }}" alt="">
		<img class="pt-img4 animate4" src="{{ asset('assets/images/shap/trangle-orange.png') }}" alt="">
		<img class="pt-img5 animate-wave" src="{{ asset('assets/images/shap/wave-orange.png') }}" alt="">
	</div>
	
	<!-- About us -->
	<section class="section-sp1 about-area">
		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col-lg-6 mb-30">
					<div class="about-thumb-area">
						<ul>
							<li><img class="about-thumb1" src="{{ asset('assets/images/about/pic-1.jpg') }}" alt=""></li>
							<li><img class="about-thumb2" src="{{ asset('assets/images/about/pic-2.jpg') }}" alt=""></li>
							<li><img class="about-thumb3" src="{{ asset('assets/images/about/pic-3.jpg') }}" alt=""></li>
							<li>
								<div class="exp-bx">
									<?php
									$startYear = 2022;
									$currentYear = date("Y");
									$totalYears = $currentYear - $startYear;
									echo $totalYears;
									?>
									<span>Year Experience</span>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6 mb-30">
					<div class="heading-bx">
						<h6 class="title-ext text-secondary">About Us – Primelogicsoft</h6>
						<h2 class="title">Transforming Ideas Into Scalable Digital Reality</h2>
						<p>Primelogicsoft is a forward-thinking IT development company dedicated to building scalable, secure, and high-performance digital solutions. We specialize in transforming ideas into powerful software products that help businesses grow, automate processes, and stay ahead in the digital era.</p>
						<p>With strong expertise in modern technologies and a passion for innovation, we deliver end-to-end development services tailored to startups, enterprises, and growing businesses.</p>
					</div>
					<div class="row">
						<div class="col-lg-6 col-sm-6 mb-30 mb-sm-20">
							<div class="feature-container feature-bx1 feature1">
								<div class="icon-md">
									<span class="icon-cell">
										<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 101.91" style="enable-background:new 0 0 122.88 101.91" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path class="st0" d="M3.34,0h116.2c1.84,0,3.34,1.5,3.34,3.34v76.98c0,1.84-1.5,3.34-3.34,3.34H3.34C1.5,83.66,0,82.16,0,80.32 V3.34C0,1.5,1.5,0,3.34,0L3.34,0L3.34,0z M12.57,11.68h9.82v2.56h-9.82V11.68L12.57,11.68z M27.07,38.8h-14.5v-2.57h14.5V38.8 L27.07,38.8z M46.8,38.81H30.02v-2.58H46.8V38.81L46.8,38.81z M75.66,38.81H49.64v-2.57h26.03V38.81L75.66,38.81z M37.25,28.07 H88.4v2.53H37.25V28.07L37.25,28.07z M25.22,28.05h9.26v2.56h-9.26V28.05L25.22,28.05z M12.57,28.05h9.82v2.56h-9.82V28.05 L12.57,28.05z M34.77,22.41H12.57v-2.54h22.21V22.41L34.77,22.41z M46.8,22.42h-9.26v-2.56h9.26V22.42L46.8,22.42z M75.66,22.43 H49.64v-2.57h26.03V22.43L75.66,22.43z M37.25,11.68h22.21v2.54H37.25V11.68L37.25,11.68z M25.22,11.68h9.26v2.56h-9.26V11.68 L25.22,11.68z M91.2,62.08l-9.1-5.1v-2.92l9.1-5.1v3.36l-6.34,3.16l6.34,3.26V62.08L91.2,62.08z M92.89,64.35l3.29-17.91h1.91 l-3.31,17.91H92.89L92.89,64.35z M99.48,62.1v-3.34l6.35-3.2l-6.35-3.24V49l9.1,5.14v2.88L99.48,62.1L99.48,62.1z M46.29,88.27 h30.3c0.08,5.24,2.24,9.93,8.09,13.63H38.2C42.88,98.51,46.31,94.39,46.29,88.27L46.29,88.27L46.29,88.27z M61.44,72.41 c2.37,0,4.29,1.92,4.29,4.29c0,2.37-1.92,4.29-4.29,4.29c-2.37,0-4.29-1.92-4.29-4.29C57.15,74.33,59.07,72.41,61.44,72.41 L61.44,72.41z M10.05,6.29h102.79c1.63,0,2.95,1.33,2.95,2.95v57.52c0,1.62-1.33,2.95-2.95,2.95H10.05c-1.62,0-2.95-1.33-2.95-2.95 V9.24C7.09,7.62,8.42,6.29,10.05,6.29L10.05,6.29L10.05,6.29z"/></g></svg>
									</span> 
								</div>
								<div class="icon-content">
									<h4 class="ttr-title">Software Development</h4>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-sm-6 mb-30 mb-sm-20">
							<div class="feature-container feature-bx1 feature2">
								<div class="icon-md">
									<span class="icon-cell">
										<svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 232.18"><path fill-rule="nonzero" d="M83.66 156.17a35.511 35.511 0 0 1-2.96-3.63c-2.18-3-4.23-6.12-6.21-9.26l-9.84-15.68c-3.74-5.45-5.7-10.42-5.7-14.36 0-3.94 2.23-9.08 6.68-10.23-.36-5.89-.59-11.88-.59-17.81 0-3.51.07-7.05.2-10.53.2-2.2.6-4.38 1.19-6.5 2.73-8.92 8.7-16.5 16.72-21.25a43.77 43.77 0 0 1 9.08-4.34c5.72-2.16 2.96-10.9 9.27-11.02 14.72-.38 38.93 12.22 48.37 22.44a37.375 37.375 0 0 1 9.64 24.21l-.6 25.79c2.62.64 4.67 2.68 5.32 5.3.79 3.16 0 7.48-2.75 13.58 0 .2-.21.2-.21.4l-11.22 18.51c-2.54 4.17-5.17 8.44-8.13 12.36-3.51 4.69-6.4 3.85-3.4 8.34.59.81 1.22 1.57 1.87 2.32-19.11 13.06-22.23 30.69-25.59 49.71-.56 3.17-1.13 6.39-1.79 9.47-.63 2.39-.71 5.56-1.02 8.12H0c0-58.76 63.16-40.09 84.62-69.62 2.47-3.63 1.82-3.36-.96-6.32zm135.62-3.31 20.9 54.87 10.5-29.91-5.15-5.63c-3.87-5.66-2.54-12.08 4.64-13.24 2.75-.45 13.74-.4 16.31.17 6.66 1.48 7.36 7.93 4.04 13.07l-5.15 5.63 10.51 29.91 18.9-54.87c13.64 12.27 50.35 14.74 65.37 23.12 20.82 11.65 20.25 34.27 24.8 55.12H129.1c4.52-20.66 4.05-43.66 24.8-55.12 18.47-10.29 50.26-9.51 65.38-23.12zm-3.86-36.8c-1.89.04-3.43-.2-5.12-1.13-2.24-1.25-3.81-3.38-4.89-5.78-2.25-5.05-4.04-18.33 1.64-22.13l-1.06-.69-.12-1.47c-.22-2.66-.27-5.9-.33-9.29-.21-12.49-.46-27.62-10.78-30.65l-4.42-1.31 2.91-3.51c8.34-10.02 17.04-18.79 25.81-25.52C228.99 6.97 239.09 1.9 248.95.44c10.16-1.5 20 .77 29.08 7.92 2.68 2.11 5.28 4.65 7.8 7.62 9.68.92 17.61 6 23.27 13.25 3.37 4.34 5.94 9.46 7.57 14.9 1.63 5.42 2.34 11.2 2.04 16.88-.56 10.18-4.37 20.12-12.08 27.37 1.35.04 2.63.35 3.76.94 4.3 2.24 4.43 7.11 3.31 11.18-1.12 3.41-2.53 7.36-3.87 10.69-1.63 4.48-4.01 5.32-8.6 4.83-10.33 45.17-72.76 46.72-85.81.04zm162.02 42.76c-1.02-1.1-1.99-2.28-2.86-3.51-2.1-2.89-4.08-5.9-5.99-8.93l-9.5-15.13c-3.61-5.26-5.5-10.06-5.5-13.86 0-3.81 2.15-8.76 6.45-9.87-.34-5.69-.57-11.47-.57-17.19 0-3.39.07-6.81.2-10.17.18-2.12.57-4.22 1.14-6.27 2.63-8.6 8.4-15.92 16.14-20.51a41.69 41.69 0 0 1 8.76-4.18c5.53-2.09 2.86-10.52 8.94-10.64 14.21-.37 37.58 11.79 46.69 21.66a36.08 36.08 0 0 1 9.31 23.36l-.58 24.89c2.53.62 4.5 2.59 5.13 5.11.76 3.05 0 7.23-2.66 13.12v-.01c0 .2-.2.2-.2.39l-10.83 17.86c-2.45 4.03-4.99 8.15-7.85 11.93-3.38 4.53-6.17 3.72-3.27 8.05C451.12 193.41 512 175.5 512 232.18H402.25l-1.05-7.43c-.73-3.35-1.35-6.88-1.96-10.33-3.17-18.01-6.1-34.55-22.56-47.39.59-.68 1.16-1.38 1.69-2.11 2.38-3.51 1.75-3.24-.93-6.1z"/></svg>
									</span> 
								</div>
								<div class="icon-content">
									<h4 class="ttr-title">Qualified Teams</h4>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-sm-6 mb-30 mb-sm-20">
							<div class="feature-container feature-bx1 feature3">
								<div class="icon-md">
									<span class="icon-cell">
										<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 92.96" style="enable-background:new 0 0 122.88 92.96" xml:space="preserve"><style type="text/css"><![CDATA[
											.st0{fill-rule:evenodd;clip-rule:evenodd;}
										]]></style><g><path class="st0" d="M100.09,6.87l2.5,3.3c0.66,0.87,0.49,2.12-0.38,2.77l-2.66,2.02c0.48,1.29,0.79,2.65,0.92,4.06l3.03,0.41 c1.08,0.15,1.84,1.15,1.69,2.23l-0.56,4.1c-0.15,1.08-1.15,1.84-2.23,1.69l-3.3-0.45c-0.59,1.28-1.34,2.46-2.22,3.52l1.85,2.43 c0.66,0.87,0.49,2.12-0.38,2.78l-3.3,2.5c-0.87,0.66-2.12,0.49-2.78-0.38l-2.02-2.66c-1.29,0.48-2.66,0.79-4.06,0.92l-0.41,3.03 c-0.15,1.08-1.15,1.84-2.23,1.69l-4.1-0.56c-1.08-0.15-1.84-1.15-1.69-2.23l0.45-3.3c-1.28-0.59-2.46-1.34-3.52-2.23l-2.43,1.85 c-0.87,0.66-2.12,0.49-2.78-0.38l-2.5-3.3c-0.66-0.87-0.49-2.12,0.38-2.77l2.66-2.02c-0.48-1.29-0.79-2.65-0.92-4.06l-3.03-0.41 c-1.08-0.15-1.84-1.15-1.69-2.23l0.56-4.1c0.15-1.08,1.15-1.84,2.23-1.69l3.3,0.45c0.59-1.28,1.34-2.46,2.23-3.52L70.84,7.9 c-0.66-0.87-0.49-2.12,0.38-2.78l3.3-2.5c0.87-0.66,2.12-0.49,2.78,0.38l2.02,2.66c1.29-0.48,2.66-0.79,4.06-0.92l0.41-3.02 c0.15-1.08,1.15-1.84,2.23-1.69l4.1,0.56c1.08,0.15,1.84,1.15,1.69,2.23l-0.45,3.3c1.28,0.59,2.46,1.34,3.52,2.23l2.43-1.85 C98.19,5.83,99.44,6,100.09,6.87L100.09,6.87L100.09,6.87z M55.71,13.75c-0.23,0.02-0.46,0.04-0.69,0.06 c-5.63,0.54-11.1,2.59-15.62,6.1c-5.23,4.05-9.2,10.11-10.73,18.14l-0.48,2.51L25.69,41c-2.45,0.43-4.64,1.02-6.56,1.77 c-1.86,0.72-3.52,1.61-4.97,2.66c-1.16,0.84-2.16,1.78-3.01,2.8c-2.63,3.15-3.85,7.1-3.82,11.1c0.03,4.06,1.35,8.16,3.79,11.53 c0.91,1.25,1.96,2.4,3.16,3.4l0.03,0.02l-2.68,7.13c-0.71-0.47-1.4-0.98-2.04-1.52c-1.68-1.4-3.15-2.99-4.4-4.72 C1.84,70.57,0.04,64.95,0,59.35c-0.04-5.66,1.72-11.29,5.52-15.85c1.23-1.48,2.68-2.84,4.34-4.04c1.93-1.4,4.14-2.58,6.64-3.55 c1.72-0.67,3.56-1.23,5.5-1.68c2.2-8.74,6.89-15.47,12.92-20.14c5.64-4.37,12.43-6.92,19.42-7.59c2.13-0.21,4.29-0.24,6.43-0.09 c-0.47,0.25-0.91,0.53-1.33,0.85l-0.03,0.02c-1.93,1.47-3.32,3.7-3.68,6.3L55.71,13.75L55.71,13.75z M43.85,87.38H31.99l-1.7,5.58 H19.6l12.75-33.87h11.46l12.7,33.87H45.55L43.85,87.38L43.85,87.38z M41.63,80.04l-3.7-12.17l-3.71,12.17H41.63L41.63,80.04z M59.78,59.09h17.41c3.79,0,6.64,0.9,8.52,2.7c1.88,1.8,2.83,4.38,2.83,7.71c0,3.42-1.04,6.1-3.09,8.03 c-2.06,1.93-5.21,2.89-9.43,2.89h-5.74v12.54h-10.5V59.09L59.78,59.09z M70.28,73.56h2.58c2.03,0,3.46-0.35,4.28-1.06 c0.82-0.7,1.23-1.6,1.23-2.7c0-1.06-0.36-1.96-1.07-2.7c-0.71-0.74-2.05-1.11-4.02-1.11h-3V73.56L70.28,73.56z M92.77,59.09h10.5 v33.87h-10.5V59.09L92.77,59.09z M112.01,31.74c1.07,0.83,2.09,1.77,3.07,2.82c1.07,1.15,2.08,2.45,3.03,3.9 c3.2,4.92,4.84,11.49,4.77,17.92c-0.07,6.31-1.77,12.59-5.25,17.21c-0.84,1.11-1.77,2.15-2.78,3.12V62.15 c0.43-1.87,0.65-3.84,0.67-5.83c0.06-5.07-1.18-10.16-3.59-13.86c-0.69-1.07-1.45-2.03-2.25-2.89c-0.65-0.7-1.34-1.34-2.05-1.9 c0.07-0.3,0.13-0.6,0.17-0.9c0.08-0.62,0.11-1.25,0.07-1.88c0.82-0.32,1.58-0.75,2.26-1.27l0.03-0.02 C110.86,33.06,111.48,32.44,112.01,31.74L112.01,31.74z M85.89,12.37c4.45,0.61,7.57,4.71,6.96,9.17 c-0.61,4.45-4.71,7.57-9.17,6.96c-4.45-0.61-7.57-4.71-6.96-9.17S81.44,11.76,85.89,12.37L85.89,12.37L85.89,12.37z"/></g></svg>
									</span> 
								</div>
								<div class="icon-content">
									<h4 class="ttr-title">API & System Integration</h4>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-sm-6 mb-30 mb-sm-20">
							<div class="feature-container feature-bx1 feature4">
								<div class="icon-md">
									<span class="icon-cell">
										<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 92.81"><defs><style>.cls-1{fill-rule:evenodd;}</style></defs><title>workstation</title><path class="cls-1" d="M90.11,21.7h28.81a4,4,0,0,1,4,4v63.2a4,4,0,0,1-4,4H90.11a4,4,0,0,1-4-4V25.65a4,4,0,0,1,4-3.95ZM11.86,50a1.68,1.68,0,1,1,0-3.36h16.7a1.68,1.68,0,0,1,0,3.36Zm0-9.55a1.68,1.68,0,1,1,0-3.36h16.7a1.68,1.68,0,1,1,0,3.36Zm0,19.11a1.68,1.68,0,1,1,0-3.36H49.38a1.68,1.68,0,0,1,0,3.36Zm.31-55.22V7.06a1.45,1.45,0,0,0,1.44,1.45h2.24a11.23,11.23,0,0,0,1.07,2.85l-1.73,1.72a1.46,1.46,0,0,0,0,2.05l2.14,2.14a1.44,1.44,0,0,0,2.05,0L21,15.69A11.59,11.59,0,0,0,23.73,17v2.43a1.45,1.45,0,0,0,1.45,1.45h3a1.46,1.46,0,0,0,1.45-1.45V17.16a11.38,11.38,0,0,0,2.85-1.07l1.72,1.72a1.44,1.44,0,0,0,2.05,0l2.14-2.14a1.45,1.45,0,0,0,0-2L36.84,12A10.86,10.86,0,0,0,38.1,9.27h2.44A1.45,1.45,0,0,0,42,7.82v-3a1.77,1.77,0,0,0-.07-.46h61A2.69,2.69,0,0,1,105.61,7v3.86h4V3a3.05,3.05,0,0,0-3-3H3A3.05,3.05,0,0,0,0,3V73.12a3,3,0,0,0,3,3H76.1V64.56H6.67A2.7,2.7,0,0,1,4,61.87V7A2.69,2.69,0,0,1,6.67,4.34Zm20.64,0a5.95,5.95,0,1,1-11.47,0Zm33.4,10.34,2.37,2.37a1.61,1.61,0,0,1,0,2.28l-1.91,1.91a12.64,12.64,0,0,1,1.19,3.16h2.47A1.62,1.62,0,0,1,71.94,26v3.36A1.62,1.62,0,0,1,70.33,31h-2.7a12.55,12.55,0,0,1-1.4,3.07L68,35.8a1.6,1.6,0,0,1,0,2.27l-2.37,2.38a1.6,1.6,0,0,1-2.27,0l-1.92-1.91a12.24,12.24,0,0,1-3.16,1.18V42.2a1.61,1.61,0,0,1-1.61,1.61H53.29a1.61,1.61,0,0,1-1.6-1.61V39.5a12.83,12.83,0,0,1-3.08-1.4l-1.75,1.75a1.62,1.62,0,0,1-2.27,0l-2.38-2.37a1.63,1.63,0,0,1,0-2.28l1.91-1.91a12.76,12.76,0,0,1-1.18-3.16H40.46a1.62,1.62,0,0,1-1.61-1.61V25.16a1.62,1.62,0,0,1,1.61-1.61h2.7a13,13,0,0,1,1.41-3.07l-1.76-1.75a1.63,1.63,0,0,1,0-2.28l2.38-2.37a1.6,1.6,0,0,1,2.27,0L49.37,16a12.86,12.86,0,0,1,3.17-1.19V12.33a1.61,1.61,0,0,1,1.6-1.61H57.5a1.62,1.62,0,0,1,1.61,1.61V15a12.76,12.76,0,0,1,3.07,1.4l1.76-1.75a1.6,1.6,0,0,1,2.27,0Zm-10.81,6a6.61,6.61,0,1,1-6.6,6.6,6.61,6.61,0,0,1,6.6-6.6ZM41,80.36H68.59c.07,4.77,2,9,7.36,12.41H33.64C37.93,89.66,41,85.91,41,80.36Zm73.23-42.28h2.87v1.64h-2.87V38.08Zm-9.72,38.35a4.31,4.31,0,1,1-4.31,4.31,4.31,4.31,0,0,1,4.31-4.31Zm-13-42.1h26a.82.82,0,0,1,.82.82v4.47a.83.83,0,0,1-.82.83h-26a.82.82,0,0,1-.82-.82V35.15a.82.82,0,0,1,.82-.82Z"/></svg>
									</span> 
								</div>
								<div class="icon-content">
									<h4 class="ttr-title">Maintenance & Technical Support</h4>
								</div>
							</div>
						</div>
					</div>
					<a href="{{ route('contact.us') }}" class="btn btn-primary shadow">Contact US</a>
				</div>
			</div>
		</div>
		<img class="pt-img1 animate-wave" src="{{ asset('assets/images/shap/wave-orange.png') }}" alt="">
		<img class="pt-img2 animate2" src="{{ asset('assets/images/shap/circle-small-blue.png') }}" alt="">
		<img class="pt-img3 animate-rotate" src="{{ asset('assets/images/shap/line-circle-blue.png') }}" alt="">
		<img class="pt-img4 animate-wave" src="{{ asset('assets/images/shap/square-dots-orange.png') }}" alt="">
		<img class="pt-img5 animate2" src="{{ asset('assets/images/shap/square-blue.png') }}" alt="">
	</section>
	
	<!-- Our Progress -->
	<section class="section-area section-sp5 work-area" style="background-image: url({{ asset('assets/images/background/line-bg2.png') }}); background-repeat: no-repeat; background-position: center; background-size: 100%;">
		<div class="container-fluid">
			<div class="heading-bx text-center">
				<h6 class="title-ext text-secondary">Working Process</h6>
				<h2 class="title">How we works?</h2>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-4 col-sm-6 mb-30">
					<div class="work-bx">
						<div class="work-num-bx">01</div>
						<div class="work-content">
							<h5 class="title text-secondary mb-10">Project Consultation</h5>
							<p>We start by understanding your business goals, technical requirements, and target audience to craft a strategic development roadmap.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 mb-30">
					<div class="work-bx active">
						<div class="work-num-bx">02</div>
						<div class="work-content">
							<h5 class="title text-secondary mb-10">Design & Development</h5>
							<p>Our expert team designs intuitive UI/UX and develops scalable, high-performance web, mobile, and SaaS solutions using modern technologies.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 mb-30">
					<div class="work-bx">
						<div class="work-num-bx">03</div>
						<div class="work-content">
							<h5 class="title text-secondary mb-10">Deployment & Support</h5>
							<p>After rigorous testing, we deploy your project smoothly and provide continuous maintenance, updates, and technical support to ensure long-term success.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<img class="pt-img1 animate1" src="{{ asset('assets/images/shap/circle-orange.png') }}" alt="">
		<img class="pt-img2 animate2" src="{{ asset('assets/images/shap/plus-orange.png') }}" alt="">
		<img class="pt-img3 animate3" src="{{ asset('assets/images/shap/circle-dots.png') }}" alt="">
	</section>

    <section class="section-sp1 service-wraper2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-30">
                    <div class="feature-container feature-bx3">
                        <h2 class="counter text-secondary">
                            <?php
                            $startYear = 2022;
                            $currentYear = date("Y");
                            $totalYears = $currentYear - $startYear;
                            echo $totalYears;
                            ?>
                        </h2>
                        <h5 class="ttr-title">Years of Excellence</h5>
                        <p>Delivering reliable, scalable, and innovative IT solutions that help businesses grow and succeed in the digital world.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-30">
                    <div class="feature-container feature-bx3">
                        <h2 class="counter text-secondary">50</h2>
                        <h5 class="ttr-title">Projects Delivered</h5>
                        <p>Successfully completed web applications, enterprise systems, eCommerce platforms, and custom software solutions across industries.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-30">
                    <div class="feature-container feature-bx3">
                        <h2 class="counter text-secondary">15</h2>
                        <h5 class="ttr-title">Technology Experts</h5>
                        <p>A skilled team of full-stack developers, UI/UX designers, and system architects committed to quality and performance.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-30">
                    <div class="feature-container feature-bx3">
                        <h2 class="counter text-secondary">30</h2>
                        <h5 class="ttr-title">Satisfied Client</h5>
                        <p>Building long-term partnerships through trust, transparency, and consistent project success.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	<!-- service -->
	<section class="section-area section-sp1 service-wraper">
		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col-xl-4 col-lg-7 mb-30">	
					<div class="heading-bx">
						<h6 class="title-ext text-secondary">Services</h6>
						<h2 class="title">We Cover A Wide Range Of Digital & Technology Services</h2>
						<p>We provide innovative digital solutions and expert guidance to help businesses grow online. Our team delivers high-quality development, design, and marketing services tailored to modern business needs.</p>
					</div>
					<a href="{{ route('services') }}" class="btn btn-secondary btn-lg shadow">All Services</a>
				</div>
				<div class="col-xl-8 mb-15">	
					<div class="swiper-container service-slide">
						<div class="swiper-wrapper">
							@foreach ($services as $service)
								<div class="swiper-slide">
									<div class="feature-container feature-bx2 feature1">
										<div class="feature-box-xl mb-30">
											<span class="icon-cell">
												<img src="{{ asset('storage/services/'.$service->image) }}" alt="{{ $service->name }}">
											</span> 
										</div>
										<div class="icon-content">
											<h3 class="ttr-title">{{ $service->name }}</h3>
											<p>{!! Str::limit(strip_tags($service->description), 200) !!}</p>
											<a href="{{ route('services.details', ['slug'=> $service->slug]) }}" class="btn btn-primary light">View More</a>
										</div>
									</div>
								</div>
							@endforeach							
						</div>
					</div>					
				</div>	 
			</div>
			<img class="pt-img1 animate-rotate" src="{{ asset('assets/images/shap/line-circle-blue.png') }}" alt="">
			<img class="pt-img2 animate2" src="{{ asset('assets/images/shap/square-dots-orange.png') }}" alt="">
			<img class="pt-img3 animate-wave" src="{{ asset('assets/images/shap/wave-blue.png') }}" alt="">
			<img class="pt-img4 animate1" src="{{ asset('assets/images/shap/square-rotate.png') }}" alt="">
		</div>
	</section>
	
	<!-- Testimonial -->
	<section class="section-area section-sp3 testimonial-wraper">
		<div class="container-fluid">
			<div class="heading-bx text-center">
				<h6 class="title-ext text-secondary">Testimonial</h6>
				<h2 class="title m-b0">See What Are The Clients <br>Saying About us</h2>
			</div>
			<div class="row align-items-center">
				<div class="col-lg-6 text-center">
					<div class="thumb-wraper">
						<img class="bg-img" src="{{ asset('assets/images/testimonials/shape.png') }}" alt="">
						<ul>
							<li data-member="1"><a href="javascript:void(0);"><img src="{{ asset('assets/images/testimonials/pic.jpg') }}" alt=""/></a></li>
							<li data-member="2"><a href="javascript:void(0);"><img src="{{ asset('assets/images/testimonials/pic.jpg') }}" alt=""/></a></li>
							<li data-member="3"><a href="javascript:void(0);"><img src="{{ asset('assets/images/testimonials/pic.jpg') }}" alt=""/></a></li>
							<li data-member="4"><a href="javascript:void(0);"><img src="{{ asset('assets/images/testimonials/pic.jpg') }}" alt=""/></a></li>
							<li data-member="5"><a href="javascript:void(0);"><img src="{{ asset('assets/images/testimonials/pic.jpg') }}" alt=""/></a></li>
							<li data-member="6"><a href="javascript:void(0);"><img src="{{ asset('assets/images/testimonials/pic.jpg') }}" alt=""/></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="swiper-container testimonial-slide">
						<div class="swiper-wrapper">
							<div class="swiper-slide" data-rel="1">
								<div class="testimonial-bx">
									<div class="testimonial-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecena ssuspendisse ultrices gravida.</p>
									</div>
									<div class="client-info">
										<h5 class="name">John Deo</h5>
										<p>Client</p>
									</div>
									<div class="quote-icon">
										<i class="fas fa-quote-left"></i>
									</div>
								</div>
							</div>
							<div class="swiper-slide" data-rel="2">
								<div class="testimonial-bx">
									<div class="testimonial-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecena ssuspendisse ultrices gravida.</p>
									</div>
									<div class="client-info">
										<h5 class="name">John Deo</h5>
										<p>Client</p>
									</div>
									<div class="quote-icon">
										<i class="fas fa-quote-left"></i>
									</div>
								</div>
							</div>
							<div class="swiper-slide" data-rel="3">
								<div class="testimonial-bx">
									<div class="testimonial-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecena ssuspendisse ultrices gravida.</p>
									</div>
									<div class="client-info">
										<h5 class="name">John Deo</h5>
										<p>Client</p>
									</div>
									<div class="quote-icon">
										<i class="fas fa-quote-left"></i>
									</div>
								</div>
							</div>
							<div class="swiper-slide" data-rel="4">
								<div class="testimonial-bx">
									<div class="testimonial-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecena ssuspendisse ultrices gravida.</p>
									</div>
									<div class="client-info">
										<h5 class="name">John Deo</h5>
										<p>Client</p>
									</div>
									<div class="quote-icon">
										<i class="fas fa-quote-left"></i>
									</div>
								</div>
							</div>
							<div class="swiper-slide" data-rel="5">
								<div class="testimonial-bx">
									<div class="testimonial-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecena ssuspendisse ultrices gravida.</p>
									</div>
									<div class="client-info">
										<h5 class="name">John Deo</h5>
										<p>Client</p>
									</div>
									<div class="quote-icon">
										<i class="fas fa-quote-left"></i>
									</div>
								</div>
							</div>
							<div class="swiper-slide" data-rel="6">
								<div class="testimonial-bx">
									<div class="testimonial-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecena ssuspendisse ultrices gravida.</p>
									</div>
									<div class="client-info">
										<h5 class="name">John Deo</h5>
										<p>Client</p>
									</div>
									<div class="quote-icon">
										<i class="fas fa-quote-left"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="swiper-button-prev test-btn-prev"><i class="las la-arrow-left"></i></div>
						<div class="swiper-button-next test-btn-next"><i class="las la-arrow-right"></i></div>
						<div class="swiper-pagination"></div>
					</div>
				</div>
			</div>
		</div>
		<img class="pt-img1 animate1" src="{{ asset('assets/images/shap/plus-orange.png') }}" alt="">
		<img class="pt-img2 animate2" src="{{ asset('assets/images/shap/square-blue.png') }}" alt="">
		<img class="pt-img3 animate3" src="{{ asset('assets/images/shap/circle-dots.png') }}" alt="">
		<img class="pt-img4 animate4" src="{{ asset('assets/images/shap/circle-orange-2.png') }}" alt="">
	</section>
	
	<!-- Blog -->
	<section class="section-area section-sp1 blog-area" style="background-image: url({{ asset('assets/images/background/line-bg2.png') }}); background-position: center; background-size: cover;">
		<div class="container-fluid">
			<div class="heading-bx text-center">
				<h6 class="title-ext text-secondary">Latest Blogs</h6>
				<h2 class="title">Our Latest Blogs</h2>
			</div>
			<div class="swiper-container blog-slide">
				<div class="swiper-wrapper">
					@foreach ($blogs as $blog)
						<div class="swiper-slide">
							<div class="blog-card">
								<div class="post-media">
									<a href="{{ route('blogs.details', ['slug'=> $blog->slug]) }}">
										<img src="{{ asset('storage/blogs/'.$blog->image) }}" alt="{{ $blog->title }}">
									</a>
								</div>
								<div class="post-info">
									<ul class="post-meta">
										<li class="author"><i class="far fa-user"></i> Admin</li>
                                    	<li class="date"><i class="far fa-calendar-alt"></i> {{ date('d M Y', strtotime($blog->created_at)) }}</li>
									</ul>
									<h5 class="post-title">
										<a href="{{ route('blogs.details', ['slug'=> $blog->slug]) }}">
											{{ $blog->title }}
										</a>
									</h5>
									<p>{!! Str::limit(strip_tags($blog->description), 240) !!}</p>		
									<a href="{{ route('blogs.details', ['slug'=> $blog->slug]) }}" class="btn btn-outline-primary btn-sm">Read More <i class="btn-icon-bx fas fa-chevron-right"></i></a>		
								</div>
							</div>							
						</div>
					@endforeach					
				</div>
			</div>
		</div>
		<img class="pt-img1 animate1" src="{{ asset('assets/images/shap/trangle-orange.png') }}" alt="">
		<img class="pt-img2 animate2" src="{{ asset('assets/images/shap/square-dots-orange.png') }}" alt="">
		<img class="pt-img3 animate-rotate" src="{{ asset('assets/images/shap/line-circle-blue.png') }}" alt="">
		<img class="pt-img4 animate-wave" src="{{ asset('assets/images/shap/wave-blue.png') }}" alt="">
	</section>
	
</div>
@endsection