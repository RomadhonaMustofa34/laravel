<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [

        'vehicle_id',
        'driver_id',
        'user_id',
        'purpose',
        'destination',
        'start_date',
        'end_date',
        'status',

    ];

    /*
    |--------------------------------------------------------------------------
    | RELATION VEHICLE
    |--------------------------------------------------------------------------
    */

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    /*
    |--------------------------------------------------------------------------
    | RELATION DRIVER
    |--------------------------------------------------------------------------
    */

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    /*
    |--------------------------------------------------------------------------
    | RELATION USER
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
    |--------------------------------------------------------------------------
    | RELATION APPROVALS
    |--------------------------------------------------------------------------
    */

    public function approvals()
    {
        return $this->hasMany(Approval::class);
    }
}