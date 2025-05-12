<?php

namespace Database\Seeders;

use App\Models\RecyclingMaterial;
use Illuminate\Database\Seeder;

class RecyclingMaterialSeeder extends Seeder
{
    public function run()
    {
        $materials = [
            [
                'name' => 'Botellas PET',
                'image_path' => 'images/materials/pet-bottles.png',
                'points_per_unit' => 5,
                'category' => 'Plástico',
                'unit' => 'kg',
                'benefits' => [
                    'Reduce la contaminación por plástico',
                    'Ahorra energía en producción',
                    'Genera empleos verdes'
                ],
                'recycling_tips' => [
                    'Lavar antes de reciclar',
                    'Retirar etiquetas',
                    'Compactar para ahorrar espacio'
                ]
            ],
            [
                'name' => 'Vidrio transparente',
                'image_path' => 'images/materials/clear-glass.png',
                'points_per_unit' => 8,
                'category' => 'Vidrio',
                'unit' => 'kg',
                'benefits' => [
                    '100% reciclable infinitamente',
                    'Ahorra un 30% de energía vs producción nueva',
                    'Reduce minería de arena de sílice'
                ],
                'recycling_tips' => [
                    'Separar por colores (transparente, verde, ámbar)',
                    'Quitar tapas metálicas',
                    'No incluir cerámica o pyrex'
                ]
            ],
            [
                'name' => 'Latas de aluminio',
                'image_path' => 'images/materials/aluminum-cans.png',
                'points_per_unit' => 12,
                'category' => 'Metal',
                'unit' => 'unidad',
                'benefits' => [
                    'Ahorra el 95% de energía vs extracción nueva',
                    'Se recicla en solo 60 días',
                    'Reduce la minería de bauxita'
                ],
                'recycling_tips' => [
                    'Enjuagar para evitar olores',
                    'Compactar para ahorrar espacio',
                    'Separar de latas de acero (usar imán)'
                ]
            ],
            [
                'name' => 'Cartón corrugado',
                'image_path' => 'images/materials/cardboard.png',
                'points_per_unit' => 3,
                'category' => 'Papel/Cartón',
                'unit' => 'kg',
                'benefits' => [
                    'Salva 17 árboles por tonelada reciclada',
                    'Ahorra 26,000 litros de agua',
                    'Reduce vertederos en un 40%'
                ],
                'recycling_tips' => [
                    'Aplanar las cajas',
                    'Retirar cinta adhesiva',
                    'Mantener seco y limpio'
                ]
            ],
            [
                'name' => 'Electrónicos pequeños',
                'image_path' => 'images/materials/e-waste.png',
                'points_per_unit' => 20,
                'category' => 'Electrónicos',
                'unit' => 'unidad',
                'benefits' => [
                    'Recupera metales preciosos',
                    'Evita contaminación por mercurio/plomo',
                    'Promueve minería urbana'
                ],
                'recycling_tips' => [
                    'Borrar datos personales',
                    'No mezclar con basura regular',
                    'Entregar en centros autorizados'
                ]
            ],
            [
                'name' => 'Pilas AA/AAA',
                'image_path' => 'images/materials/batteries.png',
                'points_per_unit' => 15,
                'category' => 'Peligrosos',
                'unit' => 'unidad',
                'benefits' => [
                    'Previene contaminación por metales pesados',
                    'Recupera zinc y manganeso',
                    'Protege fuentes de agua'
                ],
                'recycling_tips' => [
                    'No perforar ni quemar',
                    'Almacenar en contenedores secos',
                    'Usar cinta aislante en terminales'
                ]
            ],
            [
                'name' => 'Aceite de cocina usado',
                'image_path' => 'images/materials/cooking-oil.png',
                'points_per_unit' => 10,
                'category' => 'Líquidos',
                'unit' => 'litro',
                'benefits' => [
                    'Se convierte en biodiesel',
                    'Evita obstrucciones en cañerías',
                    'Previene contaminación de agua'
                ],
                'recycling_tips' => [
                    'Enfriar completamente',
                    'Filtrar restos de comida',
                    'Almacenar en botellas plásticas limpias'
                ]
            ]
        ];

        foreach ($materials as $material) {
            RecyclingMaterial::create($material);
        }
    }
}