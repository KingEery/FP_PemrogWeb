<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
{
    Schema::table('events', function (Blueprint $table) {
        $table->foreignId('events_description_id')
              ->after('id')
              ->nullable()
              ->constrained('events_description')
              ->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('events', function (Blueprint $table) {
        $table->dropForeign(['events_description_id']);
        $table->dropColumn('events_description_id');
    });
}
};
