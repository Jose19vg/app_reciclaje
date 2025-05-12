<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('recycling_centers', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('location');
        $table->string('contact');
        $table->text('materials_accepted');
        $table->string('schedule')->nullable();
        $table->decimal('rating', 3, 2)->default(0);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recycling_centers');
    }
};
