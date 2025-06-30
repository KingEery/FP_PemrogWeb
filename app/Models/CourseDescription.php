<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseDescription extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan jika tidak sesuai konvensi Laravel
    protected $table = 'course_description';

    // Kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'course_id',
        'title',
        'tag',
        'overview',
        'price',
        'price_discount',
        'instructor_name',
        'instructor_position',
        'video_count',
        'duration',
        'features',
        'image_url',
        'instructor_image_url',
    ];

    protected $casts = [
        'features' => 'array', // Ensure features is an array
        'price' => 'decimal:2', // Cast price as decimal
        'price_discount' => 'decimal:2', // Cast discount as decimal
        'video_count' => 'integer', // Cast video count as integer
        'duration' => 'integer', // Cast duration as integer
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}