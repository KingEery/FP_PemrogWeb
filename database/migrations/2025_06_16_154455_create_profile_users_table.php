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
         Schema::create('users_profile', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('fullname');
            $table->string('username')->unique();
            $table->date('dob')->nullable(); // Tanggal lahir
            $table->string('email')->unique();
            $table->text('bio')->nullable();
            $table->json('hobbies')->nullable(); // Bisa simpan array JSON
            $table->string('avatar')->nullable(); // path ke gambar
            $table->string('badges')->nullable(); // comma separated atau JSON
            $table->integer('level')->default(1);
            $table->integer('progress')->default(0); // persentase ke level berikutnya
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_profile');
    }
};
