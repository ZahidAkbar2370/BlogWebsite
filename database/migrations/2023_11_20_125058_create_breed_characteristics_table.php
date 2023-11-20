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
        // BreedCharacteristic
        Schema::create('breed_characteristics', function (Blueprint $table) {
            $table->id();
            $table->foreignId("created_by");
            $table->foreignId("breed_id");
            $table->foreignId("characteristic_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('breed_widgets');
    }
};
