<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'region_id',
        'name',
        'type',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}