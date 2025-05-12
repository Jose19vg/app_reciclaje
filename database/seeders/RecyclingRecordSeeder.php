<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RecyclingRecord;

class RecyclingRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        RecyclingRecord::create([
            'user_id' => 1,
            'product_id' => 1,
            'center_id' => 1,
            'date' => now(),
            'quantity' => 3,
            'points_awarded' => 15
        ]);

        RecyclingRecord::create([
            'user_id' => 2,
            'product_id' => 2,
            'center_id' => 2,
            'date' => now(),
            'quantity' => 5,
            'points_awarded' => 25
        ]);
    }
}
