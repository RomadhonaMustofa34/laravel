@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3>Tambah Booking Kendaraan</h3>

        <a href="{{ route('bookings.index') }}"
           class="btn btn-secondary">

            Kembali

        </a>

    </div>

    {{-- ERROR VALIDATION --}}

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

            <form action="{{ route('bookings.store') }}"
                  method="POST">

                @csrf

                {{-- VEHICLE --}}

                <div class="mb-3">

                    <label class="form-label">

                        Kendaraan

                    </label>

                    <select name="vehicle_id"
                            class="form-control"
                            required>

                        <option value="">
                            -- Pilih Kendaraan --
                        </option>

                        @foreach($vehicles as $vehicle)

                        <option value="{{ $vehicle->id }}">

                            {{ $vehicle->name }}
                            -
                            {{ $vehicle->plate_number }}

                        </option>

                        @endforeach

                    </select>

                </div>

                {{-- DRIVER --}}

                <div class="mb-3">

                    <label class="form-label">

                        Driver

                    </label>

                    <select name="driver_id"
                            class="form-control"
                            required>

                        <option value="">
                            -- Pilih Driver --
                        </option>

                        @foreach($drivers as $driver)

                        <option value="{{ $driver->id }}">

                            {{ $driver->name }}

                        </option>

                        @endforeach

                    </select>

                </div>

                {{-- DESTINATION --}}

                <div class="mb-3">

                    <label class="form-label">

                        Tujuan

                    </label>

                    <input type="text"
                           name="destination"
                           class="form-control"
                           required>

                </div>

                {{-- PURPOSE --}}

                <div class="mb-3">

                    <label class="form-label">

                        Keperluan

                    </label>

                    <textarea name="purpose"
                              class="form-control"
                              rows="4"
                              required></textarea>

                </div>

                {{-- DATE --}}

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">

                                Tanggal Mulai

                            </label>

                            <input type="datetime-local"
                                   name="start_date"
                                   class="form-control"
                                   required>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">

                                Tanggal Selesai

                            </label>

                            <input type="datetime-local"
                                   name="end_date"
                                   class="form-control"
                                   required>

                        </div>

                    </div>

                </div>

                {{-- APPROVER --}}

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">

                                Approval Level 1

                            </label>

                            <select name="approver1"
                                    class="form-control"
                                    required>

                                <option value="">
                                    -- Pilih Approver --
                                </option>

                                @foreach($approvers as $approver)

                                <option value="{{ $approver->id }}">

                                    {{ $approver->name }}

                                </option>

                                @endforeach

                            </select>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">

                                Approval Level 2

                            </label>

                            <select name="approver2"
                                    class="form-control"
                                    required>

                                <option value="">
                                    -- Pilih Approver --
                                </option>

                                @foreach($approvers as $approver)

                                <option value="{{ $approver->id }}">

                                    {{ $approver->name }}

                                </option>

                                @endforeach

                            </select>

                        </div>

                    </div>

                </div>

                <button class="btn btn-primary">

                    Simpan Booking

                </button>

            </form>

        </div>

    </div>

</div>

@endsection