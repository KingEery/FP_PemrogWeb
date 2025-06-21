

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mentorings_description', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('short_description');
            $table->text('long_description');
            $table->decimal('original_price', 10, 2);
            $table->decimal('discounted_price', 10, 2);
            $table->string('image_path');
            $table->json('target_audience')->nullable();
            $table->text('about_program');
            $table->json('basic_materials')->nullable();
            $table->json('intermediate_materials')->nullable();
            $table->json('advanced_materials')->nullable();
            $table->json('benefits')->nullable();
            $table->integer('max_participants')->default(10);
            $table->string('slug')->unique();
            $table->boolean('is_active')->default(true);
            $table->integer('duration_months')->default(3);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mentorings_description');
    }
};

