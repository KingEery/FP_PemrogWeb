<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('materis', function (Blueprint $table) {
            $table->foreignId('course_description_id')
                ->after('id') // opsional, biar rapi
                ->constrained('course_description') // karena nama tabel-mu tunggal
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('materis', function (Blueprint $table) {
            $table->dropForeign(['course_description_id']);
            $table->dropColumn('course_description_id');
        });
    }
};
