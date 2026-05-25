@extends('layouts.app')

@section('content')

<h3>Approval Booking</h3>

<table class="table table-bordered">

    <tr>
        <th>Kendaraan</th>
        <th>Tujuan</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach($approvals as $approval)

    <tr>

        <td>
            {{ $approval->booking->vehicle->name }}
        </td>

        <td>
            {{ $approval->booking->destination }}
        </td>

        <td>
            {{ $approval->booking->start_date }}
        </td>

        <td>

            <span class="badge bg-warning">
                {{ $approval->status }}
            </span>

        </td>

        <td>

            @if($approval->status == 'pending')

            <form action="{{ route('approvals.approve', $approval->id) }}"
                  method="POST"
                  class="d-inline">

                @csrf

                <button class="btn btn-success btn-sm">

                    Approve

                </button>

            </form>

            <form action="{{ route('approvals.reject', $approval->id) }}"
                  method="POST"
                  class="d-inline">

                @csrf

                <button class="btn btn-danger btn-sm">

                    Reject

                </button>

            </form>

            @endif

        </td>

    </tr>

    @endforeach

</table>

@endsection