<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NearbyBusiness extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'nearby_business_id',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
