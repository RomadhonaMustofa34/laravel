<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
  public function index()
    {
        $drivers = Driver::latest()->paginate(10);

        return view('drivers.index', compact('drivers'));
    }

    public function create()
    {
        return view('drivers.create');
    }

    public function store(Request $request)
    {
        Driver::create($request->all());

        return redirect()->route('drivers.index')
            ->with('success', 'Driver berhasil ditambah');
    }

    public function edit($id)
    {
        $driver = Driver::findOrFail($id);

        return view('drivers.edit', compact('driver'));
    }

    public function update(Request $request, $id)
    {
        $driver = Driver::findOrFail($id);

        $driver->update($request->all());

        return redirect()->route('drivers.index')
            ->with('success', 'Driver berhasil diupdate');
    }

    public function destroy($id)
    {
        Driver::destroy($id);

        return back()->with('success', 'Driver berhasil dihapus');
    }
}
