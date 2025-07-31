@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <x-dashboard-card type="bg-info" icon="fas fa-users" label="Total User" value="{{ $totalUsers }}" />
            <x-dashboard-card type="bg-success" icon="fas fa-box-open" label="Total Produk" value="{{ $totalProduk }}" />
            <x-dashboard-card type="bg-primary" icon="fas fa-shopping-cart" label="Total Order" value="{{ $totalOrder }}" />
            <x-dashboard-card type="bg-warning" icon="fas fa-wallet" label="Total Pendapatan" value="{{ $totalPendapatan }}" />
            <x-dashboard-card type="bg-info" icon="fas fa-user-friends" label="Total Pelanggan" value="{{ $pelanggan }}" />
            <x-dashboard-card type="bg-success" icon="fas fa-truck-loading" label="Total Penerimaan Barang" value="{{ $penerimaanbarang }}" />
            <x-dashboard-card type="bg-primary" icon="fas fa-file-alt" label="Total Laporan Masuk" value="{{ $laporan }}" />
            <x-dashboard-card type="bg-warning" icon="fas fa-ban" label="Total Pelanggan Berhenti" value="{{ $berhenti }}" />
        </div>

        <div class="row mt-3">
            <div class="col-lg-6">
                <!-- Pie Chart -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Pie Chart</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="pieChart" style="height: 300px;"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Bar Chart -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Bar Chart</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="barChart" style="height: 300px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(function () {
            // Pie Chart
            // Pie Chart
const pieChartCanvas = $('#pieChart').get(0).getContext('2d');

const pieChartData = {
    labels: ['Total User', 'Total Laporan', 'Penerimaan', 'Pelanggan', 'Orderan'],
    datasets: [{
        data: [
            {{ $totalUsers }},
            {{ $laporan }},
            {{ $penerimaanbarang }},
            {{ $pelanggan }},
            {{ $totalOrder }}
        ],
        backgroundColor: ['#007bff', '#28a745', '#ffc107', '#17a2b8', '#dc3545'],
        hoverOffset: 4
    }]
};

const pieChartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
        legend: {
            display: true,
            position: 'bottom'
        }
    }
};

new Chart(pieChartCanvas, {
    type: 'pie',
    data: pieChartData,
    options: pieChartOptions
});


          // Bar Chart
const barChartCanvas = $('#barChart').get(0).getContext('2d');

// Ambil data dari variabel PHP
const barChartData = {
    labels: ['Total User', 'Total Laporan', 'Penerimaan', 'Pelanggan', 'Orderan'],
    datasets: [
        {
            label: 'Jumlah',
            data: [
                {{ $totalUsers }},
                {{ $laporan }},
                {{ $penerimaanbarang }},
                {{ $pelanggan }},
                {{ $totalOrder }}
            ],
            backgroundColor: ['#007bff', '#28a745', '#ffc107', '#17a2b8', '#dc3545']
        }
    ]
};

const barChartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
        y: {
            beginAtZero: true,
            ticks: {
                stepSize: 1 // Bisa diganti sesuai range
            }
        }
    },
    plugins: {
        legend: { display: false } // Tidak perlu legend karena 1 dataset
    }
};

new Chart(barChartCanvas, {
    type: 'bar',
    data: barChartData,
    options: barChartOptions
});

        });
    </script>
@stop
