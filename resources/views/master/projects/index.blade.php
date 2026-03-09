@section('title', 'Projects')
@section('description', 'Projects')
@section('keywords', 'Projects')
@extends('layouts.app')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h1>Projects</h1>
            </div>
            <div class="col-sm-6">
                <nav class="d-flex justify-content-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('master.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Projects</li>
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
                        <h5 class="card-title mb-0">Add New Project </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('master.projects.submit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-floating">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" placeholder="Name">
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
                                    <textarea name="description" class="form-control ckeditor @error('description') is-invalid @enderror" id="description" placeholder="Description">{{ old('description') }}</textarea>
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
                                        <textarea type="text" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror" id="meta_title" placeholder="Meta Title">{{ old('meta_title') }}</textarea>
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
                                        <textarea type="text" name="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror" id="meta_keywords" placeholder="Meta Keywords">{{ old('meta_keywords') }}</textarea>
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
                                        <textarea type="text" name="meta_description" class="form-control @error('meta_description') is-invalid @enderror" id="meta_description" placeholder="Meta Description">{{ old('meta_description') }}</textarea>
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
                                <button type="submit" class="btn btn-primary btn-lg rounded-pill">Add Project</button>
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
                                <h5 class="card-title mb-0">Projects List</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-bordered example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($projects as $key => $project)
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td> {{ $project->name }} </td>
                                                    <td><img src="{{ asset('storage/projects/'.$project->image) }}" alt="{{ $project->image }}" class="img-fluid img-thumbnail" style="height: 50px;"></td>
                                                    <td>{{ date('d-m-Y', strtotime($project->created_at)) }}</td>
                                                    <td>
                                                        <a href="{{ route('master.projects.edit', $project->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                                                        <a href="{{ route('master.projects.delete', $project->id) }}" class="btn btn-danger btn-sm confirm-delete"><i class="bi bi-trash"></i></a>
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
    $('#projects a').removeClass('collapsed');
</script>
@endsection