<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RecyclingCenter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'location', 'contact', 'materials_accepted', 'schedule', 'rating'
    ];

    // Un centro de reciclaje tiene muchos registros de reciclaje
    public function recyclingRecords(): HasMany
    {
        return $this->hasMany(RecyclingRecord::class);
    }
}
