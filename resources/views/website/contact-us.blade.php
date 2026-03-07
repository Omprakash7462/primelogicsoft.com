@section('title', 'Contact Prime Logic Soft | Get in Touch for Web & Software Development')
@section('meta_title', 'Contact Prime Logic Soft | Web & Software Development Company')
@section('meta_description', 'Contact Prime Logic Soft for website development, mobile app development, SaaS solutions, and digital marketing services. Get in touch with our team for your next digital project.')
@section('meta_keywords', 'Contact Prime Logic Soft, web development company contact, software development services contact, mobile app development company, digital marketing services contact')
@extends('layouts.website')
@section('content')
<div class="page-content bg-white">
	
    <!-- Inner Banner -->
    <div class="banner-wraper">
        <div class="page-banner" style="background-image:url({{ asset('assets/images/banner/img1.jpg') }});">
            <div class="container">
                <div class="page-banner-entry text-center">
                    <h1>Contact Us</h1>
                    <!-- Breadcrumb row -->
                    <nav aria-label="breadcrumb" class="breadcrumb-row">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ul>
                    </nav>
                </div>
            </div>
            <img class="pt-img1 animate-wave" src="{{ asset('assets/images/shap/wave-blue.png') }}" alt="">
            <img class="pt-img2 animate2" src="{{ asset('assets/images/shap/circle-dots.png') }}" alt="">
            <img class="pt-img3 animate-rotate" src="{{ asset('assets/images/shap/trangle-orange.png') }}" alt="">
        </div>
        <!-- Breadcrumb row END -->
    </div>


    <section class="">
        <div class="container-fluid">
            <div class="contact-wraper">
                <div class="row">
                    <div class="col-lg-6 mb-30">
                        <form class="form-wraper contact-form ajax-form" action="#">
                            <div class="ajax-message"></div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input name="name" type="text" required class="form-control" placeholder="Your Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <input name="email" type="email" required class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group col-md-6">
                                    <input name="phone" type="text" required class="form-control" placeholder="Phone Numbers">
                                </div>
                                <div class="form-group col-md-6">
                                    <select class="form-select">
                                        <option selected>Selecty Department</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea name="message" required class="form-control" placeholder="Type Message"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="input-group">
                                        <div class="g-recaptcha" data-sitekey="6Lf2gYwUAAAAAJLxwnZTvpJqbYFWqVyzE-8BWhVe" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                                        <input class="form-control d-none" style="display:none;" data-recaptcha="true" required data-error="Please complete the Captcha">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button name="submit" type="submit" value="Submit" class="btn w-100 btn-secondary btn-lg">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 mb-30">
                        <div class="contact-info ovpr-dark" style="background-image: url({{ asset('assets/images/about/pic-1.jpg') }});">
                            <div class="info-inner">
                                <h4 class="title mb-30">Contact Us For Any Informations</h4>
                                <div class="icon-box">
                                    <h6 class="title"><i class="ti-map-alt"></i>Location</h6>		
                                    <p>Ranchi, Jharkhand</p>
                                </div>
                                <div class="icon-box">
                                    <h6 class="title"><i class="ti-id-badge"></i>Email &amp; Phone</h6>		
                                    <a href="javascript:void(0);" class="text-white">info@primelogicsoft.com</a>
                                    <p>+91 0000000000</p>
                                </div>
                                <div class="icon-box">
                                    <h6 class="title"><i class="ti-world"></i>Follow Us</h6>
                                    <ul class="social-media">
                                        <li><a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a></li>
                                        <li><a target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin"></i></a></li>
                                        <li><a target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="section-area section-sp1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="feature-container feature-bx4 feature4">
                        <div class="icon-md feature-icon">
                            <img src="{{ asset('assets/images/icon/icon1.png') }}" alt="">
                        </div>
                        <div class="icon-content">
                            <h5 class="ttr-title">Contact Number</h5>
                            <p>+91 0000000000</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="feature-container feature-bx4 feature3">
                        <div class="icon-md feature-icon">
                            <img src="{{ asset('assets/images/icon/icon3.png') }}" alt="">
                        </div>
                        <div class="icon-content">
                            <h5 class="ttr-title">Email Address</h5>
                            <p>info@primelogicsoft.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="feature-container feature-bx4 feature2">
                        <div class="icon-md feature-icon">
                            <img src="{{ asset('assets/images/icon/icon2.png') }}" alt="">
                        </div>
                        <div class="icon-content">
                            <h5 class="ttr-title">Address</h5>
                            <p>Ranchi, Jharkhand</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   

  
		
</div>
@endsection