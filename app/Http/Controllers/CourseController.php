<?php

namespace App\Http\Controllers;

use App\Models\CourseDescription;

class CourseController extends Controller
{
    public function index()
    {
        // Ambil data dari course_description karena kamu ingin semua data lengkap
        $courses = CourseDescription::with('course')->get();
        return view('course.course', compact('courses'));
    }
}