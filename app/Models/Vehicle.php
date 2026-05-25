<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id',
        'plate_number',
        'name',
        'vehicle_type',
        'ownership',
        'brand',
        'year',
        'fuel_consumption',
        'service_schedule',
        'status',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function fuelLogs()
    {
        return $this->hasMany(FuelLog::class);
    }

    public function serviceLogs()
    {
        return $this->hasMany(ServiceLog::class);
    }
}