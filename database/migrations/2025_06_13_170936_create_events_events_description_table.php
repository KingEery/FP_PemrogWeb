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
        
        Schema::create('events_description', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('category');
            $table->text('overview');
            $table->json('what_youll_learn');
            $table->json('terms_conditions');
            $table->string('price_original')->nullable();
            $table->string('price_discounted')->nullable();
            $table->string('speaker_name');
            $table->string('speaker_title');
            $table->json('dates');
            $table->string('time');
            $table->string('location');
            $table->json('includes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events_description');
    }
};