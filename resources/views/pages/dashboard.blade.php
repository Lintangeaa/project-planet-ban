@extends('layout.main')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Card untuk Total Ban -->
            <div class="col-lg-4 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $totalBans }}</h3>
                        <p>Total Ban</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-circle-dot"></i>
                    </div>
                    <a href="{{ route('mapping-generator.index') }}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <!-- Card untuk Total Motor -->
            <div class="col-lg-4 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $totalMotors }}</h3>
                        <p>Total Motor</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-motorcycle"></i>
                    </div>
                    <a href="{{ route('mapping-generator.index') }}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <!-- Card untuk Total Mapping -->
            <div class="col-lg-4 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $totalMappings }}</h3>
                        <p>Total Mappings</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                    <a href="{{ route('mapping-tools.index') }}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Section Grafik -->
        <div class="row">
            <!-- Grafik Ban vs Motor -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Ban vs Motor</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="banVsMotorChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('banVsMotorChart').getContext('2d');
        var banVsMotorChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Ban', 'Motor'],
                datasets: [{
                    label: 'Total',
                    data: [{{ $totalBans }}, {{ $totalMotors }}],
                    backgroundColor: ['#17a2b8', '#28a745'],
                    borderColor: ['#17a2b8', '#28a745'],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
