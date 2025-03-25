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
        Schema::create('garment_machines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('garment_id');
            $table->unsignedBigInteger('machine_id');
            $table->decimal('hoursRequired', 8,2);
            $table->timestamps();

            // Foreign keys
            $table->foreign('garment_id')->references('id')->on('garments')->onDelete('cascade');
            $table->foreign('machine_id')->references('id')->on('machines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('garment_machines');
    }
};
