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
        Schema::create('course_description', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->string('tag');
            $table->text('overview');
            $table->integer('price');
            $table->integer('price_discount')->nullable();
            $table->string('instructor_name');
            $table->string('instructor_position')->nullable();
            $table->integer('video_count')->default(0);
            $table->string('duration')->nullable();
            $table->json('features')->nullable();
            $table->string('image_url')->nullable();
            $table->string('instructor_image_url')->nullable();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_description');
    }

};
