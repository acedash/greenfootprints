<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FootprintRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plastic_items',
        'commute_km',
        'transport_mode_factor',
        'is_segregating',
        'carbon_kg',
        'plastic_kg',
        'trees_debt',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
