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
                        <li class="breadcrumb-item active">Destination Management</li>
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
                                <div class="row">
                                    <div class="col-sm-9"><h5 class="card-title mt-2 mb-0">Destination List</h5></div>
                                    <div class="col-sm-3">
                                        <a href="{{ route('master.destination.management.create') }}" class="btn btn-primary btn-block rounded-pill">Add Destination</a>
                                    </div>
                                </div>                                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-bordered example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Category</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>State</th>
                                                <th>City</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($destinationMasters as $key => $destinationMaster)
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td> {{ $destinationMaster->category->name }} </td>
                                                    <td> {{ $destinationMaster->name }} </td>
                                                    <td><img src="{{ asset('storage/destination/'.$destinationMaster->image) }}" alt="{{ $destinationMaster->image }}" class="img-fluid img-thumbnail" style="height: 50px;"></td>
                                                    <td> {{ $destinationMaster->state->name }} </td>
                                                    <td> {{ $destinationMaster->city->name }} </td>
                                                    <td>{{ date('d-m-Y', strtotime($destinationMaster->created_at)) }}</td>
                                                    <td>
                                                        <a href="{{ route('master.destination.management.edit', $destinationMaster->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                                                        <a href="{{ route('master.destination.management.delete', $destinationMaster->id) }}" class="btn btn-danger btn-sm confirm-delete"><i class="bi bi-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{-- {{ $destinationMasters->links('vendor.pagination.bootstrap-5') }} --}}
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