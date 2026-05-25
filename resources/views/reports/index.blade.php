@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">

    <h3>Laporan Booking</h3>

    <a href="/reports/export"
       class="btn btn-success">

        Export Excel

    </a>

</div>

<form method="GET"
      class="row mb-3">

    <div class="col-md-4">

        <input type="date"
               name="start_date"
               class="form-control">

    </div>

    <div class="col-md-4">

        <input type="date"
               name="end_date"
               class="form-control">

    </div>

    <div class="col-md-4">

        <button class="btn btn-primary">

            Filter

        </button>

    </div>

</form>

<table class="table table-bordered">

    <tr>

        <th>Kendaraan</th>
        <th>Driver</th>
        <th>Tujuan</th>
        <th>Tanggal</th>
        <th>Status</th>

    </tr>

    @foreach($bookings as $booking)

    <tr>

        <td>{{ $booking->vehicle->name }}</td>

        <td>{{ $booking->driver->name ?? '-' }}</td>

        <td>{{ $booking->destination }}</td>

        <td>{{ $booking->start_date }}</td>

        <td>{{ $booking->status }}</td>

    </tr>

    @endforeach

</table>

@endsection