@section('title', 'Edit Testimonial')
@section('description', 'Edit Testimonial')
@section('keywords', 'Edit Testimonial')
@extends('layouts.app')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h1>Edit Testimonial</h1>
            </div>
            <div class="col-sm-6">
                <nav class="d-flex justify-content-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('master.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('master.testimonials.index') }}">Testimonial</a></li>
                        <li class="breadcrumb-item active">Edit Testimonial</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section profile">
        <div class="row">            
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Edit Testimonial</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('master.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-floating">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $testimonial->name }}" placeholder="Name">
                                        <label for="name">Name</label>
                                    </div>
                                    @error('name')
                                        <div class="form-control-feedback text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-floating">
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ $testimonial->email }}" placeholder="Email">
                                        <label for="email">Email</label>
                                    </div>
                                    @error('email')
                                        <div class="form-control-feedback text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-floating">
                                        <input type="tel" maxlength="10" name="mobile" class="form-control @error('mobile') is-invalid @enderror" id="mobile" value="{{ $testimonial->mobile }}" placeholder="Mobile">
                                        <label for="mobile">Mobile</label>
                                    </div>
                                    @error('mobile')
                                        <div class="form-control-feedback text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-floating">
                                        <input type="text" name="occupation" class="form-control @error('occupation') is-invalid @enderror" id="occupation" value="{{ $testimonial->occupation }}" placeholder="Occupation">
                                        <label for="occupation">Occupation</label>
                                    </div>
                                    @error('occupation')
                                        <div class="form-control-feedback text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 mb-4">                                
                                <div class="form-floating">                                    
                                    <textarea name="message" rows="3" class="form-control @error('message') is-invalid @enderror" id="message" placeholder="Message" style="height: 150px;">{{ $testimonial->message }} </textarea>
                                    <label for="message">Message</label>
                                </div>
                                @error('message')
                                    <div class="form-control-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-lg rounded-pill">Update Testimonial</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
<script>
    $('#testimonials a').removeClass('collapsed');
</script>
@endsection