@section('title', 'Blogs')
@section('meta_title', 'Blogs')
@section('meta_description', 'Blogs')
@section('meta_keywords', 'Blogs')
@extends('layouts.website')
@section('content')
<div class="page-content bg-white">
	
    <!-- Inner Banner -->
    <div class="banner-wraper">
        <div class="page-banner" style="background-image:url({{ asset('assets/images/banner/img1.jpg') }});">
            <div class="container">
                <div class="page-banner-entry text-center">
                    <h1>Blogs</h1>
                    <!-- Breadcrumb row -->
                    <nav aria-label="breadcrumb" class="breadcrumb-row">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blogs</li>
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
                @foreach ($blogs as $blog)
                    <div class="col-xl-4 col-md-6">
                        <div class="blog-card mb-30">
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
                                <h4 class="post-title"><a href="{{ route('blogs.details', ['slug'=> $blog->slug]) }}">{{ $blog->title }}</a></h4>
                                <p>{!! Str::limit(strip_tags($blog->description), 240) !!}</p>
                                <a href="{{ route('blogs.details', ['slug'=> $blog->slug]) }}" class="btn btn-outline-primary btn-sm">Read More <i class="btn-icon-bx fas fa-chevron-right"></i></a>		
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="pagination-bx text-center mb-30 clearfix">
                        {{ $blogs->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
		
</div>
@endsection