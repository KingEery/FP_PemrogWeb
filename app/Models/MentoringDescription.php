<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MentoringDescription extends Model
{
    use HasFactory;

    protected $table = 'mentorings_description';

    protected $fillable = [
        'mentoring_id',
        'title',
        'short_description',
        'long_description',
        'target_audience',
        'original_price',
        'discounted_price',
        'about_program',
        'basic_materials',
        'intermediate_materials',
        'advanced_materials',
        'benefits',
        'max_participants',
        'slug',
        'is_active',
        'duration_months',
    ];

    protected $casts = [
        'target_audience' => 'array',
        'basic_materials' => 'array',
        'intermediate_materials' => 'array',
        'advanced_materials' => 'array',
        'benefits' => 'array',
        'is_active' => 'boolean',
    ];


    // Define the inverse relationship to Mentoring
    // public function description(): HasOne
    // {
    //     return $this->hasOne(MentoringDescription::class, 'mentoring_id');
    // }
    

}

    

