<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = [
        'origin',
        'destination',
        'cost',
        'date',
        'driver_id'
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
