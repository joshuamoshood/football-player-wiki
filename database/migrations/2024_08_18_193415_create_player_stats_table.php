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
        Schema::create('player_stats', function (Blueprint $table) {
            $table->id();
            $table->foreignId("player_id")->constrained('players')->cascadeOnDelete();
            $table->unsignedInteger("appearances");
            $table->unsignedInteger("goals");
            $table->unsignedInteger("assists");
            $table->unsignedInteger("yellow_cards");
            $table->unsignedInteger("red_cards");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_stats');
    }
};
