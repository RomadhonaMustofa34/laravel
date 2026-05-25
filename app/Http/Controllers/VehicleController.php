<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Location;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $vehicles = Vehicle::with('location')
            ->latest()
            ->paginate(10);

        return view('vehicles.index', compact('vehicles'));
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $locations = Location::all();

        return view('vehicles.create', compact('locations'));
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'plate_number' => 'required|unique:vehicles',

            'name' => 'required',

            'vehicle_type' => 'required',

            'ownership' => 'required',

        ]);

        Vehicle::create([

            'location_id' => $request->location_id,

            'plate_number' => $request->plate_number,

            'name' => $request->name,

            'vehicle_type' => $request->vehicle_type,

            'ownership' => $request->ownership,

            'status' => $request->status,

        ]);

        return redirect()
            ->route('vehicles.index')
            ->with('success', 'Kendaraan berhasil ditambahkan');
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $vehicle = Vehicle::with('location')
            ->findOrFail($id);

        return view('vehicles.show', compact('vehicle'));
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);

        $locations = Location::all();

        return view('vehicles.edit', compact(
            'vehicle',
            'locations'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);

        $vehicle->update([

            'location_id' => $request->location_id,

            'plate_number' => $request->plate_number,

            'name' => $request->name,

            'vehicle_type' => $request->vehicle_type,

            'ownership' => $request->ownership,

            'status' => $request->status,

        ]);

        return redirect()
            ->route('vehicles.index')
            ->with('success', 'Kendaraan berhasil diupdate');
    }

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);

        $vehicle->delete();

        return redirect()
            ->route('vehicles.index')
            ->with('success', 'Kendaraan berhasil dihapus');
    }
}