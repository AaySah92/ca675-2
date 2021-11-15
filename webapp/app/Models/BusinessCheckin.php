<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessCheckin extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'count_type',
        'count',
    ];

    protected $casts = [
        'count' => 'int',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
