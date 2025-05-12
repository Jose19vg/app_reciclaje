<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RecyclingCenter;

class RecyclingCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        RecyclingCenter::create([
            'name' => 'Centro de Reciclaje A',
            'location' => 'Av. Siempre Viva 742, Springfield',
            'contact' => '555-1234',
            'materials_accepted' => 'Plástico, Vidrio, Papel',
            'schedule' => 'Lunes a Viernes, 9am - 6pm',
            'rating' => 4.5
        ]);

        RecyclingCenter::create([
            'name' => 'Centro de Reciclaje B',
            'location' => 'Calle Falsa 123, Ciudad Gótica',
            'contact' => '555-5678',
            'materials_accepted' => 'Aluminio, Cartón, Electrónicos',
            'schedule' => 'Lunes a Sábado, 8am - 5pm',
            'rating' => 4.8
        ]);
    }
}
