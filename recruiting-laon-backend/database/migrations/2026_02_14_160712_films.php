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
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('original_title');
            $table->year('year');
            $table->unsignedSmallInteger('duration');
            $table->text('synopsis');
            $table->string('director');
            $table->string('image')->nullable();
            $table->string('trailer_url')->nullable();
            $table->enum('status', ['released', 'upcoming'])->default('released');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
