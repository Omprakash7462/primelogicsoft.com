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
                        <li class="breadcrumb-item active">Edit Destination</li>
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
                                <h5 class="card-title mb-0">Edit Destination Details</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('master.destination.management.update', $destinationMaster->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4 mb-4">
                                            <div class="form-floating">
                                                <select name="country_id" class="form-select country-change @error('country_id') is-invalid @enderror" id="country_id">
                                                    <option value="" disabled>Select Country</option>
                                                    @foreach($countries as $country)
                                                        <option @if($country->id == $destinationMaster->country_id) selected @endif value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="country_id">Country</label>
                                            </div>
                                            @error('country_id')
                                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <div class="col-md-4 mb-4">
                                            <div class="form-floating">
                                                <select name="state_id" class="form-select state-change @error('state_id') is-invalid @enderror" id="state_id">
                                                    <option value="" disabled>Select State</option>
                                                    @foreach($states as $state)
                                                        <option @if($state->id == $destinationMaster->state_id) selected @endif value="{{ $state->id }}">{{ $state->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="state_id">State</label>
                                            </div>
                                            @error('state_id')
                                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <div class="col-md-4 mb-4">
                                            <div class="form-floating">
                                                <select name="district_id" class="form-select district-change @error('district_id') is-invalid @enderror" id="district_id">
                                                    <option value="" disabled>Select District</option>
                                                    @foreach($districts as $district)
                                                        <option @if($district->id == $destinationMaster->district_id) selected @endif value="{{ $district->id }}">{{ $district->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="district_id">District</label>
                                            </div>
                                            @error('district_id')
                                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating">
                                                <select name="city_id" class="form-select @error('city_id') is-invalid @enderror" id="city_id">
                                                    <option value="" disabled>Select City</option>
                                                    @foreach($cities as $city)
                                                        <option @if($city->id == $destinationMaster->city_id) selected @endif value="{{ $city->id }}">{{ $city->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="city_id">City</label>
                                            </div>
                                            @error('city_id')
                                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating">
                                                <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" id="category_id">
                                                    <option selected disabled>Select Category</option>
                                                    @foreach($categories as $category)
                                                        <option @if($category->id == $destinationMaster->category_id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="category_id">Category</label>
                                            </div>
                                            @error('category_id')
                                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating">
                                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $destinationMaster->name }}" id="name" placeholder="Name">
                                                <label for="name">Name</label>
                                            </div>
                                            @error('name')
                                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>                                    
                                                                            
                                        <div class="col-md-6 mb-4">
                                            <div class="form-floating">
                                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" accept=".jpg,.jpeg,.png">
                                                <label for="image">Image</label>
                                            </div>
                                            @error('image')
                                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <div class="col-md-4 mb-4">
                                            <div class="form-floating">
                                                <input type="number" step="0.1" max="5" name="rating" class="form-control @error('rating') is-invalid @enderror" value="{{ $destinationMaster->rating }}" id="rating" placeholder="Rating">
                                                <label for="rating">Rating</label>
                                            </div>
                                            @error('rating')
                                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <div class="col-md-4 mb-4">
                                            <div class="form-floating">
                                                <input type="number" name="review" class="form-control @error('review') is-invalid @enderror" value="{{ $destinationMaster->review }}" id="review" placeholder="Review Count">
                                                <label for="review">Reviews</label>
                                            </div>
                                            @error('review')
                                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <div class="col-md-4 mb-4">
                                            <div class="form-floating">
                                                <input type="number" name="ranking" class="form-control @error('ranking') is-invalid @enderror" value="{{ $destinationMaster->ranking }}" id="ranking" placeholder="Ranking">
                                                <label for="ranking">Ranking</label>
                                            </div>
                                            @error('ranking')
                                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-4">
                                            <label for="description">Description</label>
                                            <div class="form-floating">
                                                <textarea name="description" class="form-control ckeditor @error('description') is-invalid @enderror" id="description" placeholder="Description" style="height: 120px">{{ $destinationMaster->description }}</textarea>
                                            </div>
                                            @error('description')
                                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <div class="col-md-12 mb-4">
                                            <div class="form-floating">
                                                <textarea name="history" class="form-control @error('history') is-invalid @enderror" id="history" placeholder="History" style="height: 100px">{{ $destinationMaster->history }}</textarea>
                                                <label for="history">History</label>
                                            </div>
                                            @error('history')
                                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <div class="col-md-12 mb-4">
                                            <div class="form-floating">
                                                <textarea name="foods" class="form-control @error('foods') is-invalid @enderror" id="foods" placeholder="Famous Foods" style="height: 100px">{{ $destinationMaster->foods }}</textarea>
                                                <label for="foods">Famous Foods</label>
                                            </div>
                                            @error('foods')
                                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    
                                        <div class="col-md-12 mb-4">
                                            <div class="form-floating">
                                                <input type="url" name="map_links" class="form-control @error('map_links') is-invalid @enderror" value="{{ $destinationMaster->map_links }}" id="map_links" placeholder="Map URL">
                                                <label for="map_links">Google Map Link</label>
                                            </div>
                                            @error('map_links')
                                                <div class="form-control-feedback text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>                                    
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-lg rounded-pill">Update Destination </button>
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