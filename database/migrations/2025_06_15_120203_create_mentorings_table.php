<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mentoring', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mentoring_description_id')->nullable();
            $table->string('title');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price_normal', 12, 2)->nullable();
            $table->decimal('price_discount', 12, 2)->nullable();
            $table->string('slug')->unique();
            $table->timestamps();

            // Tambahkan foreign key constraint 
            $table->foreign('mentoring_description_id')
                  ->references('id')
                  ->on('mentorings_description')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mentoring');
    }
};

