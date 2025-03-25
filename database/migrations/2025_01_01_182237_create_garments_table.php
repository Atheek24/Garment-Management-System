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
        Schema::create('garments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('design');
            $table->enum('category', ['Casual', 'Sportswear', 'Formal', 'Accessories']);
            $table->string('sizes');
            $table->decimal('basePrice', 10, 2);
            $table->integer('status')->default(1);
            $table->decimal('laborHoursPerUnit', 8, 2);
            $table->decimal('hourlyLaborRate', 8, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('garments');
    }
};
