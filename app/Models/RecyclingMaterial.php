<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecyclingMaterial extends Model
{
    protected $fillable = [
        'name', 
        'image_path',
        'points_per_unit',
        'unit',
        'benefits',
        'recycling_tips'
    ];

    protected $casts = [
        'benefits' => 'array',
        'recycling_tips' => 'array'
    ];
}