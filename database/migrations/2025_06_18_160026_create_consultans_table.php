<?php
// database/migrations/2024_01_10_create_consultans_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('consultans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('position');
            $table->string('company')->nullable();
            $table->string('specialty');
            $table->text('bio')->nullable();
            $table->integer('experience')->default(0);
            $table->decimal('rating', 2, 1)->default(5.0);
            $table->decimal('price_per_hour', 10, 2)->default(0);
            $table->string('photo_profile')->nullable();
            $table->json('certifications')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('consultans');
    }
};