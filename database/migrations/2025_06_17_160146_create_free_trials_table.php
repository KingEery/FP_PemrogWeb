<?php
// database/migrations/xxxx_create_free_trials_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('free_trials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('consultant_id')->constrained('consultants')->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('duration')->default(30); // in minutes
            $table->integer('max_participants')->default(100);
            $table->integer('used_slots')->default(0);
            $table->boolean('is_active')->default(true);
            $table->datetime('valid_until')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('meeting_link')->nullable();
            $table->text('requirements')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('free_trials');
    }
};