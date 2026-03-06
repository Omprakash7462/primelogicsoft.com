@section('title', 'Blogs')
@section('description', 'Blogs')
@section('keywords', 'Blogs')
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
  
    <section class="section-area section-sp1 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-7 col-xl-8 mb-30 mb-md-50">
                    <!-- blog start -->
                    <div class="blog-card blog-single">
                        <div class="post-media">
                            <img src="{{ asset('storage/blogs/'.$blog->image) }}" class="img-thumbnail" alt="{{ $blog->title }}">
                        </div>
                        <div class="info-bx">
                            <ul class="post-meta">
                                <li class="author"><a href="{{ route('blogs.details', ['slug'=> $blog->slug]) }}"><i class="far fa-user"></i> Admin</a></li>
                                <li class="date"><i class="far fa-calendar-alt"></i> {{ date('d M Y', strtotime($blog->created_at)) }}</li>
                            </ul>
                            <div class="ttr-post-title">
                                <h2 class="post-title">{{ $blog->title }}</h2>
                            </div>
                            <div class="ttr-post-text">
                                {!! $blog->description !!}
                            </div>                            
                        </div>
                    </div>
                    {{-- <div class="author-box blog-user mb-50">
                        <div class="author-profile-info">
                            <div class="author-profile-pic">
                                <img src="images/testimonials/pic2.jpg" alt="">
                            </div>
                            <div class="author-profile-content">
                                <h5>Sonar Z. Moyna</h5>
                                <p class="mb-20">Aenean sollicitudin, lorem quis biber idum auctor anisi elit consequat happ quam vel enim augue.</p>
                                <ul class="social-media mb-0">
                                    <li><a target="_blank" href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a></li>
                                    <li><a target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="clear" id="comment-list">
                        <div class="comments-area" id="comments">
                            <h4 class="widget-title">8 Comments</h4>
                            
                            <div class="clearfix">
                                <ol class="comment-list">
                                    <li class="comment">
                                        <div class="comment-body">
                                            <div class="comment-author vcard">
                                                <img class="avatar photo" src="images/testimonials/pic1.jpg" alt="">
                                                <div class="clearfix">
                                                    <cite class="fn">George</cite> 
                                                    <span class="says">says:</span>
                                                    <div class="comment-meta"> <a href="javascript:void(0);">May 09, 2021 at 10:45 am</a> </div>
                                                </div>
                                            </div>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>
                                            <div class="reply"> <a href="javascript:void(0);" class="comment-reply-link">Reply</a> </div>
                                        </div>
                                        <ol class="children">
                                            <li class="comment odd parent">
                                                <div class="comment-body">
                                                    <div class="comment-author vcard"> 
                                                        <img class="avatar photo" src="images/testimonials/pic2.jpg" alt=""> 
                                                        <div class="clearfix">
                                                            <cite class="fn">Falikaz</cite> 
                                                            <span class="says">says:</span> 
                                                            <div class="comment-meta"> <a href="javascript:void(0);">May 09, 2021 at 10:45 am</a></div>
                                                        </div>
                                                    </div>
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>
                                                    <div class="reply"> <a href="javascript:void(0);" class="comment-reply-link">Reply</a></div>
                                                </div>
                                            </li>
                                        </ol>
                                        <!-- list END -->
                                    </li>
                                    <li class="comment">
                                        <div class="comment-body">
                                            <div class="comment-author vcard"> 
                                                <img class="avatar photo" src="images/testimonials/pic1.jpg" alt=""> 
                                                <div class="clearfix">
                                                    <cite class="fn">Sonar</cite> 
                                                    <span class="says">says:</span> 
                                                    <div class="comment-meta"> <a href="javascript:void(0);">May 09, 2021 at 10:45 am</a> </div>
                                                </div>
                                            </div>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>
                                            <div class="reply"> <a href="javascript:void(0);" class="comment-reply-link">Reply</a> </div>
                                        </div>
                                    </li>
                                    <li class="comment">
                                        <div class="comment-body">
                                            <div class="comment-author vcard"> 
                                                <img class="avatar photo" src="images/testimonials/pic2.jpg" alt=""> 
                                                <div class="clearfix">
                                                    <cite class="fn">Michel</cite>
                                                    <span class="says">says:</span>
                                                    <div class="comment-meta"> <a href="javascript:void(0);">May 09, 2021 at 10:45 am</a> </div>
                                                </div>
                                            </div>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>
                                            <div class="reply"> <a href="javascript:void(0);" class="comment-reply-link">Reply</a> </div>
                                        </div>
                                    </li>
                                </ol>
                                <div class="comment-respond" id="respond">
                                    <h4 class="widget-title">Leave a Reply</h4>
                                    <form class="comment-form" id="commentform" method="post">
                                        <p class="comment-form-author">
                                            <label for="author">Name <span class="required">*</span></label>
                                            <input type="text" value="" name="Author"  placeholder="Author" id="author">
                                        </p>
                                        <p class="comment-form-email">
                                            <label for="email">Email <span class="required">*</span></label>
                                            <input type="text" value="" placeholder="Email" name="email" id="email">
                                        </p>
                                        <p class="comment-form-comment">
                                            <label for="comment">Comment</label>
                                            <textarea rows="8" name="comment" placeholder="Comment" id="comment"></textarea>
                                        </p>
                                        <p class="form-submit">
                                            <input type="submit" value="Submit Comment" class="submit" id="submit" name="submit">
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- blog END -->
                </div>
                <div class="col-md-12 col-lg-5 col-xl-4 mb-30">
                    <aside class="side-bar sticky-top aside-bx">
                        <div class="widget widget_search">
                            <form method="GET" role="search" action="{{ route('blogs.details', ['slug'=> $blog->slug]) }}" class="searchform">
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
                                @foreach ($blogs as $blog)
                                    <div class="widget-post clearfix">
                                        <div class="ttr-post-media"> 
                                            <img src="{{ asset('storage/blogs/'.$blog->image) }}" width="200" height="143" alt="{{ $blog->title }}"> 
                                        </div>
                                        <div class="ttr-post-info">
                                            <div class="ttr-post-header">
                                                <h6 class="post-title">
                                                    <a href="{{ route('blogs.details', ['slug'=> $blog->slug]) }}">{{ $blog->title }}</a>
                                                </h6>
                                            </div>
                                            <ul class="post-meta">
                                                <li class="date"><i class="far fa-calendar-alt"></i> {{ date('d M Y', strtotime($blog->created_at)) }}</li>
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