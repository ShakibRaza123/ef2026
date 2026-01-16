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
        Schema::create('works', function (Blueprint $table) {
            $table->id();

            $table->string('title');              // Project / Campaign name
            $table->string('slug')->unique();     // URL ke liye
            $table->text('description')->nullable();
            $table->string('hero_media_type')->nullable(); // video / image

            $table->boolean('status')->default(1);
            $table->integer('position')->default(0);

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};
