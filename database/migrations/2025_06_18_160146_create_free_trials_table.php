<?php
// database/migrations/2024_01_10_create_free_trials_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('free_trials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('consultan_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->integer('duration')->default(30); // in minutes
            $table->integer('max_participants')->default(1);
            $table->integer('used_slots')->default(0);
            $table->boolean('is_active')->default(true);
            $table->dateTime('valid_until')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('free_trials');
    }
};