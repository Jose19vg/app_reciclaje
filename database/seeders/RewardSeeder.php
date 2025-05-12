<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reward;

class RewardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Reward::create([
            'name' => 'Descuento en tienda',
            'description' => '5% de descuento en productos ecológicos',
            'image_url' => 'https://via.placeholder.com/150',
            'points_required' => 50,
            'stock' => 100
        ]);

        Reward::create([
            'name' => 'Donación a ONG',
            'description' => 'Se donarán $10 a una ONG ambientalista',
            'image_url' => 'https://via.placeholder.com/150',
            'points_required' => 100,
            'stock' => 200
        ]);
    }
}
