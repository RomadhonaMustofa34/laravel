@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h3>Tambah Kendaraan</h3>

    <a href="{{ route('vehicles.index') }}"
       class="btn btn-secondary">

        Kembali

    </a>

</div>

<div class="card border-0 shadow-sm">

    <div class="card-body">

        <form action="{{ route('vehicles.store') }}"
              method="POST">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Nomor Polisi
                </label>

                <input type="text"
                       name="plate_number"
                       class="form-control"
                       required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Nama Kendaraan
                </label>

                <input type="text"
                       name="name"
                       class="form-control"
                       required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Jenis Kendaraan
                </label>

                <select name="vehicle_type"
                        class="form-control"
                        required>

                    <option value="">
                        -- Pilih Jenis --
                    </option>

                    <option value="orang">
                        Angkutan Orang
                    </option>

                    <option value="barang">
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

                    <option value="">
                        -- Pilih Kepemilikan --
                    </option>

                    <option value="milik">
                        Milik Perusahaan
                    </option>

                    <option value="sewa">
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

                    <option value="{{ $location->id }}">

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

                    <option value="available">
                        Available
                    </option>

                    <option value="used">
                        Digunakan
                    </option>

                    <option value="service">
                        Service
                    </option>

                </select>

            </div>

            <button class="btn btn-primary">

                Simpan Kendaraan

            </button>

        </form>

    </div>

</div>

@endsection