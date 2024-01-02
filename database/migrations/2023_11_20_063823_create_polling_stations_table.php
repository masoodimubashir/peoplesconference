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
        Schema::create('polling_stations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('SNO')->unique();
            $table->string('locality')->unique();
            $table->string('building_location');
            $table->string('polling_area');
            $table->bigInteger('total_votes');
            $table->foreignId('constituency_id')->constrained('constituencies')->onDelete('cascade');
            $table->timestamps();
        });
    }

 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polling_stations');
    }
};
