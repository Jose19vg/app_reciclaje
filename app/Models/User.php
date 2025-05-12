<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role', 'avatar_url'
    ];

    protected $hidden = ['password'];

    // Un usuario tiene muchos registros de reciclaje
    public function recyclingRecords(): HasMany
    {
        return $this->hasMany(RecyclingRecord::class);
    }

    // Un usuario tiene muchos canjes
    public function redemptions(): HasMany
    {
        return $this->hasMany(Redemption::class);
    }

    // Un usuario tiene muchas publicaciones en la comunidad
    public function communityPosts(): HasMany
    {
        return $this->hasMany(CommunityPost::class);
    }

    // Un usuario puede tener muchas insignias
    public function badges(): HasMany
    {
        return $this->hasMany(Badge::class);
    }
 
}
