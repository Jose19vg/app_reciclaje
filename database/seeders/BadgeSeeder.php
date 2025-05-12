<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Badge;

class BadgeSeeder extends Seeder
{
    public function run()
    {
        Badge::create([
            'user_id' => 1,
            'name' => 'Eco Héroe',
            'description' => 'Por reciclar más de 100 productos',
            'image_url' => 'https://via.placeholder.com/150',
            'level' => 1,
            'awarded_at' => now()
        ]);

        Badge::create([
            'user_id' => 2,
            'name' => 'Maestro del Reciclaje',
            'description' => 'Por participar en 5 eventos comunitarios',
            'image_url' => 'https://via.placeholder.com/150',
            'level' => 2,
            'awarded_at' => now()
        ]);
    }
}
