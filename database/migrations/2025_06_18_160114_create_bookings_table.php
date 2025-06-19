<?php
// database/migrations/2024_01_10_create_bookings_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('consultan_id')->constrained()->onDelete('cascade');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->date('date');
            $table->time('time');
            $table->integer('duration')->default(60); // in minutes
            $table->enum('type', ['paid', 'free'])->default('paid');
            $table->enum('status', ['pending', 'confirmed', 'completed', 'cancelled'])->default('pending');
            $table->string('topic')->nullable();
            $table->text('notes')->nullable();
            $table->decimal('amount', 10, 2)->default(0);
            $table->string('meeting_link')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};