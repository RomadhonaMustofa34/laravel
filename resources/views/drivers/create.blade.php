@extends('layouts.app')

@section('content')

<h3>Tambah Driver</h3>

<form action="{{ route('drivers.store') }}"
      method="POST">

    @csrf

    <div class="mb-3">

        <label>Nama Driver</label>

        <input type="text"
               name="name"
               class="form-control">

    </div>

    <div class="mb-3">

        <label>No HP</label>

        <input type="text"
               name="phone"
               class="form-control">

    </div>

    <div class="mb-3">

        <label>Alamat</label>

        <textarea name="address"
                  class="form-control"></textarea>

    </div>

    <button class="btn btn-success">

        Simpan

    </button>

</form>

@endsection