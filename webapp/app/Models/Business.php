<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

//    protected $with = ['checkins'];

    protected $fillable = [
        'name',
        'city',
        'state',
        'latitude',
        'longitude',
    ];

    public function checkins()
    {
        return $this->hasMany(BusinessCheckin::class);
    }

    public function nearbyBusinesses()
    {
        return $this->belongsToMany(
            Business::class,
            'nearby_businesses',
            'business_id',
            'nearby_business_id',
        )->with('checkins');
    }
}
