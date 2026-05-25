@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="fw-bold">
            Edit Driver
        </h3>

        <a href="{{ route('drivers.index') }}"
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

            <form action="{{ route('drivers.update', $driver->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                {{-- NAMA DRIVER --}}

                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        Nama Driver

                    </label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name', $driver->name) }}"
                           required>

                </div>

                {{-- PHONE --}}

                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        No HP

                    </label>

                    <input type="text"
                           name="phone"
                           class="form-control"
                           value="{{ old('phone', $driver->phone) }}"
                           required>

                </div>

                {{-- ADDRESS --}}

                <div class="mb-3">

                    <label class="form-label fw-semibold">

                        Alamat

                    </label>

                    <textarea name="address"
                              class="form-control"
                              rows="4"
                              required>{{ old('address', $driver->address) }}</textarea>

                </div>

                {{-- STATUS --}}

                <div class="mb-4">

                    <label class="form-label fw-semibold">

                        Status

                    </label>

                    <select name="status"
                            class="form-control"
                            required>

                        <option value="active"
                            {{ $driver->status == 'active' ? 'selected' : '' }}>

                            Active

                        </option>

                        <option value="inactive"
                            {{ $driver->status == 'inactive' ? 'selected' : '' }}>

                            Inactive

                        </option>

                    </select>

                </div>

                {{-- BUTTON --}}

                <button class="btn btn-success">

                    Update Driver

                </button>

            </form>

        </div>

    </div>

</div>

@endsection