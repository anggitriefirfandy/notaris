<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location_model extends Model
{
    use HasFactory;
    protected $table = 'location';

    // Tentukan kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'latitude',
        'longitude',
        'radius',
    ];
}
