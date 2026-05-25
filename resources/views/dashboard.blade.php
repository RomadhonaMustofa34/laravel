@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Dashboard Monitoring Kendaraan</h3>

    <div>
        <span class="badge bg-success">
            {{ now()->format('d M Y') }}
        </span>
    </div>
</div>

<div class="row">

    <div class="col-md-4 mb-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body">

                <h6 class="text-muted">
                    Total Kendaraan
                </h6>

                <h2 class="fw-bold text-primary">
                    {{ $totalVehicles }}
                </h2>

            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body">

                <h6 class="text-muted">
                    Total Booking
                </h6>

                <h2 class="fw-bold text-success">
                    {{ $totalBookings }}
                </h2>

            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body">

                <h6 class="text-muted">
                    Total Driver
                </h6>

                <h2 class="fw-bold text-danger">
                    {{ $totalDrivers }}
                </h2>

            </div>
        </div>
    </div>

</div>

<div class="row mt-4">

    <div class="col-md-8">

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0">
                    Grafik Pemakaian Kendaraan
                </h5>
            </div>

            <div class="card-body">
                <canvas id="bookingChart" height="100"></canvas>
            </div>
        </div>

    </div>

    <div class="col-md-4">

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0">
                    Informasi
                </h5>
            </div>

            <div class="card-body">

                <ul class="list-group">

                    <li class="list-group-item d-flex justify-content-between">
                        <span>Kendaraan Aktif</span>
                        <span class="badge bg-primary">
                            {{ $totalVehicles }}
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        <span>Booking Aktif</span>
                        <span class="badge bg-success">
                            {{ $totalBookings }}
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total Driver</span>
                        <span class="badge bg-danger">
                            {{ $totalDrivers }}
                        </span>
                    </li>

                </ul>

            </div>
        </div>

    </div>

</div>

<div class="row mt-4">

    <div class="col-md-12">

        <div class="card border-0 shadow-sm">

            <div class="card-header bg-white">
                <h5 class="mb-0">
                    Statistik Pemakaian Kendaraan
                </h5>
            </div>

            <div class="card-body">

                <table class="table table-bordered">

                    <thead class="table-light">

                        <tr>
                            <th>Bulan</th>
                            <th>Total Booking</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($chart as $month => $total)

                        <tr>
                            <td>
                                {{ DateTime::createFromFormat('!m', $month)->format('F') }}
                            </td>

                            <td>
                                {{ $total }}
                            </td>
                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>
<!-- 
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('bookingChart');

new Chart(ctx, {

    type: 'bar',

    data: {

        labels: {!! json_encode($chart->keys()) !!},

        datasets: [{

            label: 'Total Booking',

            data: {!! json_encode($chart->values()) !!},

            borderWidth: 1

        }]

    },

    options: {

        responsive: true,

        plugins: {

            legend: {
                display: true
            }

        },

        scales: {

            y: {
                beginAtZero: true
            }

        }

    }

});

</script> -->

@endsection