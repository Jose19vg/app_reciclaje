<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecyclingRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'product_id', 'center_id', 'date', 'quantity', 'points_awarded'
    ];

    // Un registro de reciclaje pertenece a un usuario
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Un registro de reciclaje pertenece a un producto
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    // Un registro de reciclaje pertenece a un centro de reciclaje
    public function recyclingCenter(): BelongsTo
    {
        return $this->belongsTo(RecyclingCenter::class, 'center_id');
    }

    public function material()
    {
        return $this->belongsTo(RecyclingMaterial::class);
    }
}
