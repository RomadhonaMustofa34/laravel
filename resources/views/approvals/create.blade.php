@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h3>Tambah Approval</h3>

    <a href="{{ route('approvals.index') }}"
       class="btn btn-secondary">

        Kembali

    </a>

</div>

<div class="card border-0 shadow-sm">

    <div class="card-body">

        <form action="{{ route('approvals.store') }}"
              method="POST">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Booking Kendaraan
                </label>

                <select name="booking_id"
                        class="form-control"
                        required>

                    <option value="">
                        -- Pilih Booking --
                    </option>

                    @foreach($bookings as $booking)

                    <option value="{{ $booking->id }}">

                        {{ $booking->vehicle->name }}
                        -
                        {{ $booking->destination }}

                    </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Approver
                </label>

                <select name="approver_id"
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

            <div class="mb-3">

                <label class="form-label">
                    Level Approval
                </label>

                <select name="level"
                        class="form-control"
                        required>

                    <option value="1">
                        Level 1
                    </option>

                    <option value="2">
                        Level 2
                    </option>

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Status
                </label>

                <select name="status"
                        class="form-control">

                    <option value="pending">
                        Pending
                    </option>

                    <option value="approved">
                        Approved
                    </option>

                    <option value="rejected">
                        Rejected
                    </option>

                </select>

            </div>

            <button class="btn btn-primary">

                Simpan

            </button>

        </form>

    </div>

</div>

@endsection