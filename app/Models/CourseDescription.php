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
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
