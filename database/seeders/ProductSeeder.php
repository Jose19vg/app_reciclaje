<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Botella de plástico',
            'qr_code' => 'QR123456',
            'description' => 'Botella de plástico reciclable',
            'brand' => 'Coca Cola',
            'category' => 'Bebidas',
            'material' => 'Plástico',
            'recyclable' => true
        ]);

        Product::create([
            'name' => 'Lata de aluminio',
            'qr_code' => 'QR789012',
            'description' => 'Lata de aluminio reciclable',
            'brand' => 'Pepsi',
            'category' => 'Bebidas',
            'material' => 'Aluminio',
            'recyclable' => true
        ]);
    }
}


