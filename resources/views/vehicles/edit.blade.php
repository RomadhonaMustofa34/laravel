@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h3>Edit Kendaraan</h3>

    <a href="{{ route('vehicles.index') }}"
       class="btn btn-secondary">

        Kembali

    </a>

</div>

<div class="card border-0 shadow-sm">

    <div class="card-body">

        <form action="{{ route('vehicles.update', $vehicle->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">
                    Nomor Polisi
                </label>

                <input type="text"
                       name="plate_number"
                       class="form-control"
                       value="{{ $vehicle->plate_number }}"
                       required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Nama Kendaraan
                </label>

                <input type="text"
                       name="name"
                       class="form-control"
                       value="{{ $vehicle->name }}"
                       required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Jenis Kendaraan
                </label>

                <select name="vehicle_type"
                        class="form-control"
                        required>

                    <option value="orang"
                        {{ $vehicle->vehicle_type == 'orang' ? 'selected' : '' }}>

                        Angkutan Orang

                    </option>

                    <option value="barang"
                        {{ $vehicle->vehicle_type == 'barang' ? 'selected' : '' }}>

                        Angkutan Barang

                    </option>

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Kepemilikan
                </label>

                <select name="ownership"
                        class="form-control"
                        required>

                    <option value="milik"
                        {{ $vehicle->ownership == 'milik' ? 'selected' : '' }}>

                        Milik Perusahaan

                    </option>

                    <option value="sewa"
                        {{ $vehicle->ownership == 'sewa' ? 'selected' : '' }}>

                        Kendaraan Sewa

                    </option>

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Lokasi
                </label>

                <select name="location_id"
                        class="form-control">

                    <option value="">
                        -- Pilih Lokasi --
                    </option>

                    @foreach($locations as $location)

                    <option value="{{ $location->id }}"
                        {{ $vehicle->location_id == $location->id ? 'selected' : '' }}>

                        {{ $location->name }}

                    </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Status Kendaraan
                </label>

                <select name="status"
                        class="form-control">

                    <option value="available"
                        {{ $vehicle->status == 'available' ? 'selected' : '' }}>

                        Available

                    </option>

                    <option value="used"
                        {{ $vehicle->status == 'used' ? 'selected' : '' }}>

                        Digunakan

                    </option>

                    <option value="service"
                        {{ $vehicle->status == 'service' ? 'selected' : '' }}>

                        Service

                    </option>

                </select>

            </div>

            <button class="btn btn-success">

                Update Kendaraan

            </button>

        </form>

    </div>

</div>

@endsection