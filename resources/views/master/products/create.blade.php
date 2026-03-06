@section('title', 'Destination Management')
@section('description', 'Destination Management')
@section('keywords', 'Destination Management')
@extends('layouts.app')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h1>Destination Management</h1>
            </div>
            <div class="col-sm-6">
                <nav class="d-flex justify-content-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('master.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('master.destination.management.index') }}">Destination Management</a></li>
                        <li class="breadcrumb-item active">Add Destination</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Fill Destination Details</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('master.destination.management.submit') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        {{-- Country --}}
                                        <div class="col-md-4 mb-4">
                                            <div class="form-floating">
                                                <select name="country_id" class="form-select country-change @error('country_id') is-invalid @enderror" id="country_id">
                                                    <option value="" disabled {{ old('country_id') ? '' : 'selected' }}>Select Country</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="country_id">Country</label>
                                            </div>
                                            @error('country_id')
                                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                
                                        {{-- State --}}
                                        <div class="col-md-4 mb-4">
                                            <div class="form-floating">
                                                <select name="state_id" class="form-select state-change @error('state_id') is-invalid @enderror" id="state_id">
                                                    <option value="" selected disabled>Select State</option>
                                                </select>
                                                <label for="state_id">State</label>
                                            </div>
                                            @error('state_id')
                                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                
                                        {{-- District --}}
                                        <div class="col-md-4 mb-4">
                                            <div class="form-floating">
                                                <select name="district_id" class="form-select district-change @error('district_id') is-invalid @enderror" id="district_id">
                                                    <option value="" selected disabled>Select District</option>
                                                </select>
                                                <label for="district_id">District</label>
                                            </div>
                                            @error('district_id')
                                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                
                                        {{-- City --}}
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating">
                                                <select name="city_id" class="form-select @error('city_id') is-invalid @enderror" id="city_id">
                                                    <option selected disabled>Select City</option>
                                                </select>
                                                <label for="city_id">City</label>
                                            </div>
                                            @error('city_id')
                                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                
                                        {{-- Category --}}
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating">
                                                <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" id="category_id">
                                                    <option selected disabled>Select Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="category_id">Category</label>
                                            </div>
                                            @error('category_id')
                                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                
                                        {{-- Name --}}
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating">
                                                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name">
                                                <label for="name">Name</label>
                                            </div>
                                            @error('name')
                                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                
                                        {{-- Image --}}
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating">
                                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" accept=".jpg,.jpeg,.png">
                                                <label for="image">Image</label>
                                            </div>
                                            @error('image')
                                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                
                                        {{-- Rating --}}
                                        <div class="col-md-4 mb-4">
                                            <div class="form-floating">
                                                <input type="number" step="0.1" max="5" name="rating" value="{{ old('rating') }}" class="form-control @error('rating') is-invalid @enderror" id="rating" placeholder="Rating">
                                                <label for="rating">Rating</label>
                                            </div>
                                            @error('rating')
                                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                
                                        {{-- Review --}}
                                        <div class="col-md-4 mb-4">
                                            <div class="form-floating">
                                                <input type="number" name="review" value="{{ old('review') }}" class="form-control @error('review') is-invalid @enderror" id="review" placeholder="Review Count">
                                                <label for="review">Reviews</label>
                                            </div>
                                            @error('review')
                                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                
                                        {{-- Ranking --}}
                                        <div class="col-md-4 mb-4">
                                            <div class="form-floating">
                                                <input type="number" name="ranking" value="{{ old('ranking') }}" class="form-control @error('ranking') is-invalid @enderror" id="ranking" placeholder="Ranking">
                                                <label for="ranking">Ranking</label>
                                            </div>
                                            @error('ranking')
                                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                
                                        {{-- Description --}}
                                        <div class="col-md-12 mb-4">
                                            <label for="description">Description</label>
                                            <div class="form-floating">
                                                <textarea name="description" class="form-control ckeditor @error('description') is-invalid @enderror" id="description" placeholder="Description" style="height: 120px">{{ old('description') }}</textarea>
                                            </div>
                                            @error('description')
                                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                
                                        {{-- History --}}
                                        <div class="col-md-12 mb-4">
                                            <div class="form-floating">
                                                <textarea name="history" class="form-control @error('history') is-invalid @enderror" id="history" placeholder="History" style="height: 100px">{{ old('history') }}</textarea>
                                                <label for="history">History</label>
                                            </div>
                                            @error('history')
                                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                
                                        {{-- Foods --}}
                                        <div class="col-md-12 mb-4">
                                            <div class="form-floating">
                                                <textarea name="foods" class="form-control @error('foods') is-invalid @enderror" id="foods" placeholder="Famous Foods" style="height: 100px">{{ old('foods') }}</textarea>
                                                <label for="foods">Famous Foods</label>
                                            </div>
                                            @error('foods')
                                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                
                                        {{-- Map Link --}}
                                        <div class="col-md-12 mb-4">
                                            <div class="form-floating">
                                                <input type="url" name="map_links" value="{{ old('map_links') }}" class="form-control @error('map_links') is-invalid @enderror" id="map_links" placeholder="Map URL">
                                                <label for="map_links">Google Map Link</label>
                                            </div>
                                            @error('map_links')
                                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                
                                        {{-- Submit --}}
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-lg rounded-pill">Submit Destination</button>
                                        </div>
                                    </div>
                                </form>                                
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
    $('#destination-management a').addClass('active');
</script>
@endsection