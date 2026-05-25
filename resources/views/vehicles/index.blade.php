@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h3>Data Kendaraan</h3>

    <a href="{{ route('vehicles.create') }}"
       class="btn btn-primary">

        Tambah Kendaraan

    </a>

</div>

<div class="card border-0 shadow-sm">

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead class="table-light">

                <tr>

                    <th>No</th>
                    <th>No Polisi</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Kepemilikan</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($vehicles as $vehicle)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $vehicle->plate_number }}
                    </td>

                    <td>
                        {{ $vehicle->name }}
                    </td>

                    <td>

                        @if($vehicle->vehicle_type == 'orang')

                            <span class="badge bg-info">
                                Angkutan Orang
                            </span>

                        @else

                            <span class="badge bg-secondary">
                                Angkutan Barang
                            </span>

                        @endif

                    </td>

                    <td>

                        @if($vehicle->ownership == 'milik')

                            <span class="badge bg-success">
                                Milik
                            </span>

                        @else

                            <span class="badge bg-warning">
                                Sewa
                            </span>

                        @endif

                    </td>

                    <td>
                        {{ $vehicle->location->name ?? '-' }}
                    </td>

                    <td>

                        @if($vehicle->status == 'available')

                            <span class="badge bg-success">
                                Available
                            </span>

                        @elseif($vehicle->status == 'used')

                            <span class="badge bg-primary">
                                Digunakan
                            </span>

                        @else

                            <span class="badge bg-danger">
                                Service
                            </span>

                        @endif

                    </td>

                    <td>

                        <a href="{{ route('vehicles.edit', $vehicle->id) }}"
                           class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('vehicles.destroy', $vehicle->id) }}"
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

                @empty

                <tr>

                    <td colspan="8"
                        class="text-center">

                        Data kendaraan kosong

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection