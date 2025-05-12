<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'qr_code', 'description', 'brand', 'category', 'material', 'recyclable'
    ];

    // Un producto puede estar en muchos registros de reciclaje
    public function recyclingRecords(): HasMany
    {
        return $this->hasMany(RecyclingRecord::class);
    }
}
