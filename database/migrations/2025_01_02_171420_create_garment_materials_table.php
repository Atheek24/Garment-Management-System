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
        Schema::create('garment_materials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('garment_id');
            $table->unsignedBigInteger('material_id');
            $table->decimal('quantity_needed', 10, 2);
            $table->timestamps();

            // Foreign keys
            $table->foreign('garment_id')->references('id')->on('garments')->onDelete('cascade');
            $table->foreign('material_id')->references('id')->on('materials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('garment_materials');
    }
};
