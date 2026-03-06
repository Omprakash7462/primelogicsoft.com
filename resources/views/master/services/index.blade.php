@section('title', 'Category')
@section('description', 'Category')
@section('keywords', 'Category')
@extends('layouts.app')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h1>Category</h1>
            </div>
            <div class="col-sm-6">
                <nav class="d-flex justify-content-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('master.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Category</li>
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
                        <h5 class="card-title mb-0">Add New Category </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('master.category.submit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-floating">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name">
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
                                    <textarea name="description" class="form-control ckeditor @error('description') is-invalid @enderror" id="description" placeholder="Description"></textarea>
                                </div>
                                @error('description')
                                    <div class="form-control-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-lg rounded-pill">Add Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Category List</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-bordered example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Destination</th>
                                                <th>Description</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $key => $category)
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td> {{ $category->name }} </td>
                                                    <td><img src="{{ asset('storage/category/'.$category->image) }}" alt="{{ $category->image }}" class="img-fluid img-thumbnail" style="height: 50px;"></td>
                                                    <td>{{ $category->destinations->count() }}</td>
                                                    <td>{{ strip_tags($category->description) }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($category->created_at)) }}</td>
                                                    <td>
                                                        <a href="{{ route('master.category.edit', $category->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                                                        <a href="{{ route('master.category.delete', $category->id) }}" class="btn btn-danger btn-sm confirm-delete"><i class="bi bi-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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