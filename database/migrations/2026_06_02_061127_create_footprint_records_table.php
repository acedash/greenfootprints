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
        Schema::create('footprint_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('plastic_items');
            $table->integer('commute_km');
            $table->float('transport_mode_factor');
            $table->boolean('is_segregating')->default(false);
            $table->float('carbon_kg');
            $table->float('plastic_kg');
            $table->float('trees_debt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footprint_records');
    }
};
