@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h3>Edit Approval</h3>

    <a href="{{ route('approvals.index') }}"
       class="btn btn-secondary">

        Kembali

    </a>

</div>

<div class="card border-0 shadow-sm">

    <div class="card-body">

        <form action="{{ route('approvals.update', $approval->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">
                    Booking Kendaraan
                </label>

                <select name="booking_id"
                        class="form-control"
                        required>

                    @foreach($bookings as $booking)

                    <option value="{{ $booking->id }}"
                        {{ $approval->booking_id == $booking->id ? 'selected' : '' }}>

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

                    @foreach($approvers as $approver)

                    <option value="{{ $approver->id }}"
                        {{ $approval->approver_id == $approver->id ? 'selected' : '' }}>

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
                        class="form-control">

                    <option value="1"
                        {{ $approval->level == 1 ? 'selected' : '' }}>

                        Level 1

                    </option>

                    <option value="2"
                        {{ $approval->level == 2 ? 'selected' : '' }}>

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

                    <option value="pending"
                        {{ $approval->status == 'pending' ? 'selected' : '' }}>

                        Pending

                    </option>

                    <option value="approved"
                        {{ $approval->status == 'approved' ? 'selected' : '' }}>

                        Approved

                    </option>

                    <option value="rejected"
                        {{ $approval->status == 'rejected' ? 'selected' : '' }}>

                        Rejected

                    </option>

                </select>

            </div>

            <button class="btn btn-success">

                Update

            </button>

        </form>

    </div>

</div>

@endsection