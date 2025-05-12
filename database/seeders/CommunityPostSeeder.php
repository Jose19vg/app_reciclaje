<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CommunityPost;

class CommunityPostSeeder extends Seeder
{
    public function run()
    {
        CommunityPost::create([
            'user_id' => 1,
            'title' => '¿Cómo reciclar correctamente el plástico?',
            'content' => 'Aquí hay algunos consejos sobre cómo reciclar plástico de manera eficiente...',
            'date' => now(),
            'type' => 'pregunta'
        ]);

        CommunityPost::create([
            'user_id' => 2,
            'title' => 'Evento de limpieza en la playa',
            'content' => '¡Este sábado organizaremos una limpieza en la playa, únete!',
            'date' => now(),
            'type' => 'evento'
        ]);
    }
}
