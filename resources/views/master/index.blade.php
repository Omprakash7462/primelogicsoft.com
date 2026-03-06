@section('title', 'Dashboard')
@section('description', 'Dashboard')
@section('keywords', 'Dashboard')

@extends('layouts.app')

@section('content')
    <section class="section dashboard">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Welcome back, {{ Auth::user()->name }}</div>
                    <div class="card-body pt-3">                        
                        <p>
                            Welcome back, {{ Auth::user()->name }}! 🎉 We’re thrilled to have you here again. Your presence was missed at {{ config('app.name', 'Tourister Map') }}. Explore exciting new features, updates, and personalized experiences made just for you. Whether you're continuing where you left off or starting fresh, we're here to make your journey smoother and more rewarding. Let’s get started! 🌟
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="row">            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Visitor Details Chart</h5>
                        <div id="lineChart"></div>
                    </div>
                </div>
            </div>            
        </div>
    </section>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('master/vendor/apexcharts/apexcharts.min.js?v=1.10.6') }}"></script>
<script>
    $('#dashboard a').removeClass('collapsed');    
    document.addEventListener("DOMContentLoaded", () => {
        new ApexCharts(document.querySelector("#lineChart"), {
            series: [{
                name: "Users",
                data: @json($counts)
            }],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                enabled: false
                }
            },
            dataLabels: {
                enabled: true
            },
            stroke: {
                curve: 'straight'
            },
            grid: {
                row: {
                colors: ['#f3f3f3', 'transparent'],
                opacity: 0.5
                },
            },
            xaxis: {
                categories: @json($months),
            }
        }).render();
    });
   
</script>
@endsection