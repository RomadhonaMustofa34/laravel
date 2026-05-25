<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\Approval;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $bookings = Booking::with([
            'vehicle',
            'driver',
            'user'
        ])->latest()->paginate(10);

        return view('bookings.index', compact('bookings'));
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $vehicles = Vehicle::where('status', 'available')->get();

        $drivers = Driver::where('status', 'active')->get();

        $approvers = User::where('role', 'approver')->get();

        return view('bookings.create', compact(
            'vehicles',
            'drivers',
            'approvers'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'vehicle_id' => 'required',

            'driver_id' => 'required',

            'destination' => 'required',

            'purpose' => 'required',

            'start_date' => 'required',

            'end_date' => 'required',

            'approver1' => 'required|different:approver2',

            'approver2' => 'required',

        ]);

        /*
        |--------------------------------------------------------------------------
        | CREATE BOOKING
        |--------------------------------------------------------------------------
        */

        $booking = Booking::create([

            'vehicle_id' => $request->vehicle_id,

            'driver_id' => $request->driver_id,

            // sementara user default
            'user_id' => 1,

            'purpose' => $request->purpose,

            'destination' => $request->destination,

            'start_date' => $request->start_date,

            'end_date' => $request->end_date,

            'status' => 'pending',

        ]);

        /*
        |--------------------------------------------------------------------------
        | APPROVAL LEVEL 1
        |--------------------------------------------------------------------------
        */

        Approval::create([

            'booking_id' => $booking->id,

            'approver_id' => $request->approver1,

            'level' => 1,

            'status' => 'pending',

        ]);

        /*
        |--------------------------------------------------------------------------
        | APPROVAL LEVEL 2
        |--------------------------------------------------------------------------
        */

        Approval::create([

            'booking_id' => $booking->id,

            'approver_id' => $request->approver2,

            'level' => 2,

            'status' => 'waiting',

        ]);

        /*
        |--------------------------------------------------------------------------
        | UPDATE STATUS VEHICLE
        |--------------------------------------------------------------------------
        */

        Vehicle::find($request->vehicle_id)
            ->update([

                'status' => 'used'

            ]);

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking berhasil dibuat');
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);

        $vehicles = Vehicle::all();

        $drivers = Driver::all();

        $approvers = User::where('role', 'approver')->get();

        return view('bookings.edit', compact(

            'booking',
            'vehicles',
            'drivers',
            'approvers'

        ));
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $request->validate([

            'vehicle_id' => 'required',

            'driver_id' => 'required',

            'destination' => 'required',

            'purpose' => 'required',

            'start_date' => 'required',

            'end_date' => 'required',

        ]);

        $booking = Booking::findOrFail($id);

        $booking->update([

            'vehicle_id' => $request->vehicle_id,

            'driver_id' => $request->driver_id,

            'destination' => $request->destination,

            'purpose' => $request->purpose,

            'start_date' => $request->start_date,

            'end_date' => $request->end_date,

            'status' => $request->status,

        ]);

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking berhasil diupdate');
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | KEMBALIKAN STATUS VEHICLE
        |--------------------------------------------------------------------------
        */

        Vehicle::find($booking->vehicle_id)
            ->update([

                'status' => 'available'

            ]);

        /*
        |--------------------------------------------------------------------------
        | DELETE APPROVAL
        |--------------------------------------------------------------------------
        */

        Approval::where('booking_id', $booking->id)
            ->delete();

        /*
        |--------------------------------------------------------------------------
        | DELETE BOOKING
        |--------------------------------------------------------------------------
        */

        $booking->delete();

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking berhasil dihapus');
    }
}