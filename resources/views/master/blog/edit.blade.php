@section('title', 'Edit Blog')
@section('description', 'Edit Blog')
@section('keywords', 'Edit Blog')
@extends('layouts.app')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h1>Edit Blog</h1>
            </div>
            <div class="col-sm-6">
                <nav class="d-flex justify-content-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('master.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('master.blog.index') }}">Blog</a></li>
                        <li class="breadcrumb-item active">Edit Blog</li>
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
                        <h5 class="card-title mb-0">Edit Blog </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('master.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-floating">
                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $blog->title }}" id="title" placeholder="Title">
                                        <label for="title">Title</label>
                                    </div>
                                    @error('title')
                                        <div class="form-control-feedback text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-floating">
                                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" placeholder="Image" accept=".jpg, .jpeg, .png">
                                        <label for="image">Image</label>
                                    </div>
                                    @error('image')
                                        <div class="form-control-feedback text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 mb-4">                                
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control ckeditor @error('description') is-invalid @enderror" id="description" placeholder="Description">{{ $blog->description }}</textarea>
                                </div>
                                @error('description')
                                    <div class="form-control-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-floating">
                                        <textarea type="text" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror" id="meta_title" placeholder="Meta Title">{{ $blog->meta_title }}</textarea>
                                        <label for="meta_title">Meta Title</label>
                                    </div>
                                    @error('meta_title')
                                        <div class="form-control-feedback text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-floating">
                                        <textarea type="text" name="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror" id="meta_keywords" placeholder="Meta Keywords">{{ $blog->meta_keywords }}</textarea>
                                        <label for="meta_keywords">Meta Keywords</label>
                                    </div>
                                    @error('meta_keywords')
                                        <div class="form-control-feedback text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-4">
                                    <div class="form-floating">
                                        <textarea type="text" name="meta_description" class="form-control @error('meta_description') is-invalid @enderror" id="meta_description" placeholder="Meta Description">{{ $blog->meta_description }}</textarea>
                                        <label for="meta_description">Meta Description</label>
                                    </div>
                                    @error('meta_description')
                                        <div class="form-control-feedback text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-lg rounded-pill">Update Blog</button>
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
    $('#blog a').removeClass('collapsed');
</script>
@endsection