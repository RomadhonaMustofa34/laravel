@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="fw-bold">
            Edit Booking Kendaraan
        </h3>

        <a href="{{ route('bookings.index') }}"
           class="btn btn-secondary">

            Kembali

        </a>

    </div>

    {{-- VALIDATION ERROR --}}

    @if ($errors->any())

    <div class="alert alert-danger">

        <ul class="mb-0">

            @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

    @endif

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <form action="{{ route('bookings.update', $booking->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                {{-- VEHICLE --}}

                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        Kendaraan

                    </label>

                    <select name="vehicle_id"
                            class="form-control"
                            required>

                        <option value="">
                            -- Pilih Kendaraan --
                        </option>

                        @foreach($vehicles as $vehicle)

                        <option value="{{ $vehicle->id }}"
                            {{ old('vehicle_id', $booking->vehicle_id) == $vehicle->id ? 'selected' : '' }}>

                            {{ $vehicle->name }}
                            -
                            {{ $vehicle->plate_number }}

                        </option>

                        @endforeach

                    </select>

                </div>

                {{-- DRIVER --}}

                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        Driver

                    </label>

                    <select name="driver_id"
                            class="form-control"
                            required>

                        <option value="">
                            -- Pilih Driver --
                        </option>

                        @foreach($drivers as $driver)

                        <option value="{{ $driver->id }}"
                            {{ old('driver_id', $booking->driver_id) == $driver->id ? 'selected' : '' }}>

                            {{ $driver->name }}

                        </option>

                        @endforeach

                    </select>

                </div>

                {{-- DESTINATION --}}

                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        Tujuan

                    </label>

                    <input type="text"
                           name="destination"
                           class="form-control"
                           value="{{ old('destination', $booking->destination) }}"
                           required>

                </div>

                {{-- PURPOSE --}}

                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        Keperluan

                    </label>

                    <textarea name="purpose"
                              class="form-control"
                              rows="4"
                              required>{{ old('purpose', $booking->purpose) }}</textarea>

                </div>

                {{-- DATE --}}

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label fw-semibold">

                                Tanggal Mulai

                            </label>

                            <input type="datetime-local"
                                   name="start_date"
                                   class="form-control"
                                   value="{{ old('start_date', \Carbon\Carbon::parse($booking->start_date)->format('Y-m-d\TH:i')) }}"
                                   required>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label fw-semibold">

                                Tanggal Selesai

                            </label>

                            <input type="datetime-local"
                                   name="end_date"
                                   class="form-control"
                                   value="{{ old('end_date', \Carbon\Carbon::parse($booking->end_date)->format('Y-m-d\TH:i')) }}"
                                   required>

                        </div>

                    </div>

                </div>

                {{-- STATUS --}}

                <div class="mb-4">

                    <label class="form-label fw-semibold">

                        Status Booking

                    </label>

                    <select name="status"
                            class="form-control"
                            required>

                        <option value="pending"
                            {{ old('status', $booking->status) == 'pending' ? 'selected' : '' }}>

                            Pending

                        </option>

                        <option value="approved"
                            {{ old('status', $booking->status) == 'approved' ? 'selected' : '' }}>

                            Approved

                        </option>

                        <option value="rejected"
                            {{ old('status', $booking->status) == 'rejected' ? 'selected' : '' }}>

                            Rejected

                        </option>

                    </select>

                </div>

                {{-- BUTTON --}}

                <button class="btn btn-success">

                    Update Booking

                </button>

            </form>

        </div>

    </div>

</div>

@endsection