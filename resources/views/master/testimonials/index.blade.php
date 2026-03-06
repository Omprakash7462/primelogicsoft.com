@section('title', 'Review Master')
@section('description', 'Review Master')
@section('keywords', 'Review Master')
@extends('layouts.app')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h1>Review Master</h1>
            </div>
            <div class="col-sm-6">
                <nav class="d-flex justify-content-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('master.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Review Master</li>
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
                        <h5 class="card-title mb-0">Add New Review</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('master.review-master.submit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-floating">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" placeholder="Name">
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
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" placeholder="Email">
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
                                        <input type="tel" maxlength="10" name="mobile" class="form-control @error('mobile') is-invalid @enderror" id="mobile" value="{{ old('mobile') }}" placeholder="Mobile">
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
                                        <input type="text" name="occupation" class="form-control @error('occupation') is-invalid @enderror" id="occupation" value="{{ old('occupation') }}" placeholder="Occupation">
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
                                    <textarea name="message" rows="3" class="form-control @error('message') is-invalid @enderror" id="message" placeholder="Message" style="height: 150px;">{{ old('message') }} </textarea>
                                    <label for="message">Message</label>
                                </div>
                                @error('message')
                                    <div class="form-control-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-lg rounded-pill">Add Review</button>
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
                                <h5 class="card-title mb-0">Review List</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-bordered example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Occupation</th>
                                                <th>Message</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($reviewMasters as $key => $reviewMaster)
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td> {{ $reviewMaster->name }} </td>
                                                    <td> {{ $reviewMaster->email }} </td>
                                                    <td> {{ $reviewMaster->mobile }} </td>
                                                    <td> {{ $reviewMaster->occupation }} </td>
                                                    <td> {{ $reviewMaster->message }} </td>
                                                    <td>{{ date('d-m-Y', strtotime($reviewMaster->created_at)) }}</td>
                                                    <td>
                                                        <a href="{{ route('master.review-master.edit', $reviewMaster->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                                                        <a href="{{ route('master.review-master.delete', $reviewMaster->id) }}" class="btn btn-danger btn-sm confirm-delete"><i class="bi bi-trash"></i></a>
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
    $('#reviewMaster a').removeClass('collapsed');
</script>
@endsection