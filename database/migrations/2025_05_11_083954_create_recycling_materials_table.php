<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recycling_materials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->string('image_path'); // Se guardará en public/images/recycling
            $table->integer('points_per_unit');
            $table->string('unit'); // kg, unidad, litro
            $table->text('description')->nullable();
            $table->json('benefits')->nullable(); // Alternativa: tabla benefits relacionada
            $table->json('recycling_tips');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recycling_materials');
    }
};
