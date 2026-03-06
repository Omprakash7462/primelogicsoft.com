@section('title', 'Visitor Details')
@section('description', 'Visitor Details')
@section('keywords', 'Visitor Details')
@extends('layouts.app')
@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h1>Visitor Details</h1>
            </div>
            <div class="col-sm-6">
                <nav class="d-flex justify-content-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('master.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Visitor Details</li>
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
                            <div class="card-body mt-4">
                                <div class="table-responsive">
                                    <table id="example" class="table table-bordered example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>IP Address</th>
                                                <th>User Agent</th>
                                                <th>Created Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($visitorDetails as $key => $visitorDetail)
                                                <tr>
                                                    <th scope="row">{{ $key + 1 }}</th>
                                                    <td>{{ $visitorDetail->ip_address }}</td>
                                                    <td>{{ $visitorDetail->user_agent }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($visitorDetail->created_at)) }}</td>
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
    $('#visitor-details a').removeClass('collapsed');
</script>
@endsection