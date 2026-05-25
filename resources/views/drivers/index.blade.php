@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">

    <h3>Data Driver</h3>

    <a href="{{ route('drivers.create') }}"
       class="btn btn-primary">

        Tambah Driver

    </a>

</div>

<table class="table table-bordered">

    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>No HP</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach($drivers as $driver)

    <tr>

        <td>{{ $loop->iteration }}</td>

        <td>{{ $driver->name }}</td>

        <td>{{ $driver->phone }}</td>

        <td>{{ $driver->status }}</td>

        <td>

            <a href="{{ route('drivers.edit', $driver->id) }}"
               class="btn btn-warning btn-sm">

                Edit

            </a>

            <form action="{{ route('drivers.destroy', $driver->id) }}"
                  method="POST"
                  class="d-inline">

                @csrf
                @method('DELETE')

                <button class="btn btn-danger btn-sm">
                    Hapus
                </button>

            </form>

        </td>

    </tr>

    @endforeach

</table>

@endsection