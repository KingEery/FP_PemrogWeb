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
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->string('title'); // "Acara & Konferensi Developer"
            $table->string('image')->nullable(); // "image/devfest.jpg"
            $table->string('category'); // "Web Programming"
            $table->text('overview'); // overview tentang DevFest
            $table->json('what_youll_learn'); // array topik yang dipelajari
            $table->json('terms_conditions'); // array syarat & ketentuan
            $table->string('price_original')->nullable(); // Rp. 200.000
            $table->string('price_discounted')->nullable(); // Free
            $table->string('speaker_name');
            $table->string('speaker_title');
            $table->json('dates'); // array tanggal: ["20 Nov", "21 Nov", ...]
            $table->string('time');
            $table->string('location');
            $table->json('includes'); // array: [Slide Materi, Sertifikat, dll]
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
