@section('title', 'Prime Logic Soft Products | Innovative Software & SaaS Solutions')
@section('meta_title', 'Prime Logic Soft Products | Software & SaaS Solutions')
@section('meta_description', 'Explore innovative software products from Prime Logic Soft including SaaS platforms, custom business tools, and digital solutions designed to improve efficiency and accelerate business growth.')
@section('meta_keywords', 'Prime Logic Soft products, SaaS software solutions, business software tools, custom software products, digital business solutions, IT software company')
@extends('layouts.website')
@section('content')
<div class="page-content bg-white">
	
    <!-- Inner Banner -->
    <div class="banner-wraper">
        <div class="page-banner" style="background-image:url({{ asset('assets/images/banner/img1.jpg') }});">
            <div class="container">
                <div class="page-banner-entry text-center">
                    <h1>Products</h1>
                    <!-- Breadcrumb row -->
                    <nav aria-label="breadcrumb" class="breadcrumb-row">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Products</li>
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
  
    <section class="section-area section-sp1">
        <div class="container-fluid">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-xl-4 col-md-6">
                        <div class="blog-card mb-30">
                            <div class="post-media">
                                <a href="{{ route('products.details', ['slug'=> $product->slug]) }}">
                                    <img src="{{ asset('storage/products/'.$product->image) }}" alt="{{ $product->title }}">
                                </a>
                            </div>
                            <div class="post-info">
                                <ul class="post-meta">
                                    <li class="author"><i class="far fa-user"></i> Admin</li>
                                    <li class="date"><i class="far fa-calendar-alt"></i> {{ date('d M Y', strtotime($product->created_at)) }}</li>
                                </ul>
                                <h4 class="post-title"><a href="{{ route('products.details', ['slug'=> $product->slug]) }}">{{ $product->name }}</a></h4>
                                <p>{!! Str::limit(strip_tags($product->description), 240) !!}</p>
                                <a href="{{ route('products.details', ['slug'=> $product->slug]) }}" class="btn btn-outline-primary btn-sm">Read More <i class="btn-icon-bx fas fa-chevron-right"></i></a>		
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="pagination-bx text-center mb-30 clearfix">
                        {{ $products->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
		
</div>
@endsection