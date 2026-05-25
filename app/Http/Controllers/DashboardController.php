<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Booking;
use App\Models\Driver;

class DashboardController extends Controller
{
    public function index()
    {
        $totalVehicles = Vehicle::count();
        $totalBookings = Booking::count();
        $totalDrivers = Driver::count();

        $chart = Booking::selectRaw('MONTH(start_date) as month, COUNT(*) as total')
            ->groupBy('month')
            ->pluck('total', 'month');

        return view('dashboard', compact(
            'totalVehicles',
            'totalBookings',
            'totalDrivers',
            'chart'
        ));
    }
}
