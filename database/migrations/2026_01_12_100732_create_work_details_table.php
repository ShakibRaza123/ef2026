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
        Schema::create('work_details', function (Blueprint $table) {
    $table->id();

    // Relation with works table
    $table->foreignId('work_id')
          ->constrained('works')
          ->onDelete('cascade');

    // Inside page hero
    $table->string('inner_hero_media')->nullable();
    $table->enum('inner_hero_type', ['image', 'video'])->default('image');

    // Intro content
    $table->string('intro_heading')->nullable();
    $table->longText('intro_description')->nullable();

    // Services list
    $table->json('services')->nullable();

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_details');
    }
};
