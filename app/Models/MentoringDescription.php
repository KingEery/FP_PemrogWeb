<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MentoringDescription extends Model
{
    use HasFactory;

    protected $table = 'mentorings_description';

    protected $fillable = [
        'title',
        'short_description',
        'long_description',
        'original_price',
        'discounted_price',
        'image_path',
        'target_audience',
        'about_program',
        'basic_materials',
        'intermediate_materials',
        'advanced_materials',
        'benefits',
        'max_participants',
        'slug',
        'is_active',
        'duration_months'
    ];

    protected $casts = [
        'target_audience' => 'array',
        'basic_materials' => 'array',
        'intermediate_materials' => 'array',
        'advanced_materials' => 'array',
        'benefits' => 'array',
        'is_active' => 'boolean',
    ];

    // Tidak perlu auto-create mentoring lagi
    // Semua data sudah ada di MentoringDescription
}