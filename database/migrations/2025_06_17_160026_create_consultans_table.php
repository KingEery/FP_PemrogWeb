<?php
// database/migrations/2024_01_01_000001_create_consultants_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('consultants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->text('bio')->nullable();
            $table->string('position')->nullable(); // e.g., "Product Engineer at Zero One Group"
            $table->string('company')->nullable(); // e.g., "Zero One Group"
            $table->string('specialty')->nullable(); // e.g., "Product Management"
            $table->string('location')->nullable(); // e.g., "Jakarta Timur"
            $table->decimal('rating', 3, 2)->default(0.00);
            $table->integer('total_reviews')->default(0);
            $table->decimal('hourly_rate', 10, 2)->default(150000.00);
            $table->string('profile_image')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->json('experiences')->nullable(); // Array of work experiences
            $table->json('educations')->nullable(); // Array of educations
            $table->json('skills')->nullable(); // Array of skills/tags
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consultants');
    }
};

