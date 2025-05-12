<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Redemption;

class RedemptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Redemption::create([
            'user_id' => 1,
            'reward_id' => 1,
            'redemption_date' => now(),
            'redemption_code' => 'REDEEM123',
            'status' => 'completado'
        ]);

        Redemption::create([
            'user_id' => 2,
            'reward_id' => 2,
            'redemption_date' => now(),
            'redemption_code' => 'REDEEM456',
            'status' => 'pendiente'
        ]);
    }
}
