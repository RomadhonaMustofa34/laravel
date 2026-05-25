@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h3>Data Booking Kendaraan</h3>

    <a href="{{ route('bookings.create') }}"
       class="btn btn-primary">

        Tambah Booking

    </a>

</div>

<div class="card border-0 shadow-sm">

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead class="table-light">

                <tr>

                    <th>No</th>
                    <th>Kendaraan</th>
                    <th>Driver</th>
                    <th>Tujuan</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Status</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($bookings as $booking)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $booking->vehicle->name }}
                    </td>

                    <td>
                        {{ $booking->driver->name ?? '-' }}
                    </td>

                    <td>
                        {{ $booking->destination }}
                    </td>

                    <td>
                        {{ $booking->start_date }}
                    </td>

                    <td>
                        {{ $booking->end_date }}
                    </td>

                    <td>

                        @if($booking->status == 'pending')

                            <span class="badge bg-warning">
                                Pending
                            </span>

                        @elseif($booking->status == 'approved')

                            <span class="badge bg-success">
                                Approved
                            </span>

                        @else

                            <span class="badge bg-danger">
                                Rejected
                            </span>

                        @endif

                    </td>

                    <td>

                        <a href="{{ route('bookings.edit', $booking->id) }}"
                           class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('bookings.destroy', $booking->id) }}"
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

                        Data booking kosong

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection