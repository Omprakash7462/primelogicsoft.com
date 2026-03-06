@section('title', 'Change Password')
@section('description', 'Change Password')
@section('keywords', 'Change Password')
@extends('layouts.app')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h1>Change Password</h1>
            </div>
            <div class="col-sm-6">
                <nav class="d-flex justify-content-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('master.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Change Password</li>
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
                        <h5 class="card-title">Change Password</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('master.update.password') }}" method="POST">
                            @csrf
                            <div class="col-md-12 mb-4">
                                <div class="form-floating">
                                    <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" value="{{ old('old_password') }}" placeholder="Old Password">
                                    <label for="old_password">Old Password</label>
                                </div>
                                @error('old_password')
                                    <div class="form-control-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-4">
                                <div class="form-floating">
                                    <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" value="{{ old('new_password') }}" placeholder="Old Password">
                                    <label for="new_password">New Password</label>
                                </div>
                                @error('new_password')
                                    <div class="form-control-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-4">
                                <div class="form-floating">
                                    <input type="password" name="new_password_confirmation" class="form-control @error('new_password_confirmation') is-invalid @enderror" id="new_password_confirmation" value="{{ old('new_password_confirmation') }}" placeholder="Confirm Password">
                                    <label for="new_password_confirmation">Confirm Password</label>
                                </div>
                                @error('new_password_confirmation')
                                    <div class="form-control-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>                                    
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
<script>
    $('#change-password a').removeClass('collapsed');
</script>
@endsection