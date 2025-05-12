<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RemoveDuplicatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // En database/seeders/RemoveDuplicatesSeeder.php
    public function run()
    {
        $keepId = \App\Models\RecyclingMaterial::where('name', 'Botellas PET')
            ->latest()
            ->first()
            ->id;

        \App\Models\RecyclingMaterial::where('name', 'Botellas PET')
            ->where('id', '!=', $keepId)
            ->delete();
    }
}
