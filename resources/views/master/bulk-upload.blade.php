@section('title', 'Bulk Upload')
@section('description', 'Bulk Upload')
@section('keywords', 'Bulk Upload')
@extends('layouts.app')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h1>Bulk Upload</h1>
            </div>
            <div class="col-sm-6">
                <nav class="d-flex justify-content-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('master.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Bulk Upload</li>
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
                        <h5 class="card-title">Zip File Upload</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('master.bulk.upload.process') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 mb-4">
                                <div class="form-floating">
                                    <input type="file" name="zip_file" class="form-control @error('zip_file') is-invalid @enderror" id="zip_file" placeholder="Zip File" accept=".zip">
                                    <label for="zip_file">Zip File</label>
                                </div>
                                @error('zip_file')
                                    <div class="form-control-feedback text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-4">
                                <button type="submit" class="btn btn-primary btn-lg rounded-pill">Upload Images</button>
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
                            <div class="card-body mt-4">
                                <div class="table-responsive">
                                    <table id="example" class="table table-bordered example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>File Path</th>
                                                <th>Photo</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($zipBulkImages as $key => $zipBulkImage)
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td> <input type="text" value="{{ asset('storage/bulk/images/'.$zipBulkImage->file_name) }}" readonly class="form-control"> </td>
                                                    <td><img src="{{ asset('storage/bulk/images/'.$zipBulkImage->file_name) }}" alt="{{ $zipBulkImage->file_name }}" class="img-fluid" style="height: 50px;"></td>
                                                    <td>{{ date('d-m-Y', strtotime($zipBulkImage->created_at)) }}</td>
                                                    <td>
                                                        <a href="{{ route('master.bulk.upload.delete', $zipBulkImage->id) }}" class="btn btn-danger btn-sm confirm-delete"><i class="bi bi-trash"></i></a>
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
    $('#bulk-upload a').removeClass('collapsed');
</script>
@endsection