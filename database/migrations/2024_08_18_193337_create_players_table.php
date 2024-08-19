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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->unsignedInteger("age");
            $table->foreignId('country_id')->nullable()->constrained('countries')->nullOnDelete();
            $table->foreignId("football_club_id")->nullable()->constrained("football_clubs")->nullOnDelete();
            $table->string("profile_pic")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
