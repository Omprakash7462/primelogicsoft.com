@section('title', 'Profile')
@section('description', 'Profile')
@section('keywords', 'Profile')
@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('master.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div>
    <section class="section profile">
        <div class="row">
            <div class="col-xl-5">
                <div class="card">
                    <div class="card-body profile-card pt-4">
                        <div class="d-flex flex-column align-items-center">
                            <img src="{{ asset('storage/users/'.Auth::user()->profile_image) }}" alt="Profile" class="rounded-circle">
                            <h2>{{ Auth::user()->name }}</h2>
                            <h3>{{ config('app.name', 'Tourister Map') }}</h3>
                        </div>
                        <div class="profile-overview">                             
                            <h5 class="card-title">Profile Details</h5>            
                            <div class="row">
                                <div class="col-xl-3 col-md-3 label"> Name</div>
                                <div class="col-xl-9 col-md-9">{{ Auth::user()->name }}</div>
                            </div>        
                            <div class="row">
                                <div class="col-xl-3 col-md-3 label">Email</div>
                                <div class="col-xl-9 col-md-9">{{ Auth::user()->email }}</div>
                            </div>
                            <div class="row">
                                <div class="col-xl-3 col-md-3 label">Phone</div>
                                <div class="col-xl-9 col-md-9">{{ Auth::user()->mobile }}</div>
                            </div>                            
                            <div class="row">
                                <div class="col-xl-3 col-md-3 label">Gender</div>
                                <div class="col-xl-9 col-md-9">{{ Auth::user()->gender }}</div>
                            </div>
                        </div>            
                    </div>
                </div>
            </div>
            <div class="col-xl-7">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Update Profile Details</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('master.update.profile') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 mb-4">
                                <div class="form-floating">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ Auth::user()->name }}" placeholder="Name">
                                    <label for="name">Name</label>
                                </div>
                                @error('name')
                                    <div class="form-control-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-4">
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ Auth::user()->email }}" placeholder="Email">
                                    <label for="email">Email</label>
                                </div>
                                @error('email')
                                    <div class="form-control-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-4">
                                <div class="form-floating">
                                    <input type="tel" name="mobile" class="form-control @error('mobile') is-invalid @enderror" id="mobile" value="{{ Auth::user()->mobile }}" placeholder="Mobile">
                                    <label for="mobile">Mobile</label>
                                </div>
                                @error('mobile')
                                    <div class="form-control-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="form-floating">
                                    <select name="gender" class="form-control @error('gender') is-invalid @enderror" id="gender" value="{{ old('gender') }}" placeholder="Gender">
                                        <option value="">Select Gender</option>
                                        <option value="Male" {{ Auth::user()->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ Auth::user()->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                        <option value="Other" {{ Auth::user()->gender == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    <label for="gender">Gender</label>
                                </div>
                                @error('gender')
                                    <div class="form-control-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-4">
                                <div class="form-floating">
                                    <input type="file" name="profile_image" class="form-control @error('profile_image') is-invalid @enderror" id="profile_image" value="{{ old('profile_image') }}" placeholder="Profile Image">
                                    <label for="profile_image">Profile Image</label>
                                </div>
                                @error('profile_image')
                                    <div class="form-control-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg rounded-pill">Update Details</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
<script>
    $('#profile a').removeClass('collapsed');
</script>
@endsection