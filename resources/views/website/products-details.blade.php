@section('title', $product->title)
@section('meta_title', $product->meta_title)
@section('meta_description', $product->meta_description)
@section('meta_keywords', $product->meta_keywords)
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
  
    <section class="section-area section-sp1 bg-white">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-7 col-xl-8 mb-30 mb-md-50">
                    <!-- blog start -->
                    <div class="blog-card blog-single">
                        <div class="post-media">
                            <img src="{{ asset('storage/products/'.$product->image) }}" class="img-thumbnail" alt="{{ $product->name }}">
                        </div>
                        <div class="info-bx">
                            <ul class="post-meta">
                                <li class="author"><i class="far fa-user"></i> Admin</li>
                                <li class="date"><i class="far fa-calendar-alt"></i> {{ date('d M Y', strtotime($product->created_at)) }}</li>
                            </ul>
                            <div class="ttr-post-title">
                                <h2 class="post-title">{{ $product->name }}</h2>
                            </div>
                            <div class="ttr-post-text">
                                {!! $product->description !!}
                            </div>                            
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-5 col-xl-4 mb-30">
                    <aside class="side-bar sticky-top aside-bx">
                        <div class="widget widget_search">
                            <form method="GET" role="search" action="{{ route('products.details', ['slug'=> $product->slug]) }}" class="searchform">
                                <div class="input-group">
                                    <input name="title" class="form-control" min="3" value="{{ $searchTitle }}" placeholder="Enter your keywords..." type="text" required>
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i></button>
                                    </div> 
                                </div>
                            </form>
                        </div>
                        <div class="widget recent-posts-entry">
                            <h4 class="widget-title">Recent Posts</h4>
                            <div class="widget-post-bx">
                                @foreach ($products as $product)
                                    <div class="widget-post clearfix">
                                        <div class="ttr-post-media"> 
                                            <img src="{{ asset('storage/products/'.$product->image) }}" width="200" height="143" alt="{{ $product->name }}"> 
                                        </div>
                                        <div class="ttr-post-info">
                                            <div class="ttr-post-header">
                                                <h6 class="post-title">
                                                    <a href="{{ route('products.details', ['slug'=> $product->slug]) }}">{{ $product->name }}</a>
                                                </h6>
                                            </div>
                                            <ul class="post-meta">
                                                <li class="date"><i class="far fa-calendar-alt"></i> {{ date('d M Y', strtotime($product->created_at)) }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                                
                            </div>
                        </div>                        
                    </aside>
                </div>
            </div>
        </div>
    </section>
		
</div>
@endsection