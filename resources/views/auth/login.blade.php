@section('title', 'Login')
@section('description', 'Login')
@section('keywords', 'Login')
@extends('layouts.website')

@section('content')
<div class="page-content bg-white">
	
    <!-- Inner Banner -->
    <div class="banner-wraper">
        <div class="page-banner" style="background-image:url({{ asset('assets/images/banner/img1.jpg') }});">
            <div class="container">
                <div class="page-banner-entry text-center">
                    <h1>Login</h1>
                    <!-- Breadcrumb row -->
                    <nav aria-label="breadcrumb" class="breadcrumb-row">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Login</li>
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

    <section class="mt-5">
        <div class="container-fluid">            
            <div class="row">
                <div class="col-lg-8 offset-md-2 mb-30">
                    <div class="contact-wraper">
                        <form class="form-wraper" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="email" class="col-form-label">{{ __('Email Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                           {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="password" class="col-form-label">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-lg-12">
                                    <button name="submit" type="submit" value="Submit" class="btn w-100 btn-secondary btn-lg">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>           
        </div>
    </section>
</div>
@endsection
