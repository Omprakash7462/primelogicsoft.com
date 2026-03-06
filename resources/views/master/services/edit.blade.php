@section('title', 'Edit Category')
@section('description', 'Edit Category')
@section('keywords', 'Edit Category')
@extends('layouts.app')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h1>Edit Category</h1>
            </div>
            <div class="col-sm-6">
                <nav class="d-flex justify-content-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('master.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('master.category.index') }}">Category</a></li>
                        <li class="breadcrumb-item active">Edit Category</li>
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
                        <h5 class="card-title mb-0">Edit Category </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('master.category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-floating">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $category->name }}" id="name" placeholder="Name">
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
                                    <textarea name="description" class="form-control ckeditor @error('description') is-invalid @enderror" id="description" placeholder="Description">{{ $category->description }}</textarea>
                                </div>
                                @error('description')
                                    <div class="form-control-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-lg rounded-pill">Update Category</button>
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
    $('#destination-master a').removeClass('collapsed');
    $('#destination-master ul').addClass('show');
    $('#category a').addClass('active');
</script>
@endsection