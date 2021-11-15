<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessesCloseTo extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'close_to_business_id',
    ];

    protected $table = 'businesses_close_to';
}
