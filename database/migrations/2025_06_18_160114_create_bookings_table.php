<?php
// database/migrations/xxxx_create_bookings_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('consultant_id')->constrained('consultants')->onDelete('cascade');
            $table->foreignId('free_trial_id')->nullable()->constrained('free_trials')->onDelete('set null');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->date('booking_date');
            $table->time('booking_time');
            $table->integer('duration')->default(60); // in minutes
            $table->enum('type', ['paid', 'free'])->default('paid');
            $table->enum('status', ['pending', 'confirmed', 'completed', 'cancelled'])->default('pending');
            $table->string('topic')->nullable();
            $table->text('notes')->nullable();
            $table->decimal('amount', 10, 2)->default(0.00);
            $table->string('meeting_link')->nullable();
            $table->integer('rating')->nullable();
            $table->text('feedback')->nullable();
            $table->timestamps();
            
            // Indexes for better performance
            $table->index(['consultant_id', 'booking_date']);
            $table->index(['status']);
            $table->index(['type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};