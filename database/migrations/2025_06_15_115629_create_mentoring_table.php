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
        Schema::create('mentoring', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('image')->nullable();
        $table->text('description')->nullable();
        $table->decimal('price_normal', 12, 2)->nullable();
        $table->decimal('price_discount', 12, 2)->nullable();
        $table->string('slug')->unique();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentoring');
    }
};
