<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'course';

    protected $fillable = [
        'title',
        'instructor',
        'duration',
        'video_count',
        'original_price',
        'price',
        'thumbnail',
    ];

    public function description()
    {
        return $this->hasOne(CourseDescription::class);
    }

    public function index()
{
    $courses = Course::with('description')->get(); // ← penting!
    return view('course.course', compact('courses'));
}
}
