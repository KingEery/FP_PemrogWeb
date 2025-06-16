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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');         // Judul event (contoh: DevFest Jakarta)
            $table->string('location');      // Lokasi event (contoh: Jakarta)
            $table->date('date');            // Tanggal event (contoh: 2023-10-01)
            $table->string('category');      // Kategori event (web-programming, ui-ux, dsb.)
            $table->string('price');         // Harga atau keterangan harga (contoh: Gratis)
            $table->string('image');         // Path/URL gambar event (contoh: image/devfest.jpg)
            $table->timestamps();            // created_at dan updated_at

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
