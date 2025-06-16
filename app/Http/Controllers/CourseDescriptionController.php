<?php

namespace App\Http\Controllers;

use App\Models\CourseDescription;

class CourseDescriptionController extends Controller
{
    public function index()
    {
        $course_description = CourseDescription::with('course')->get();
        return view('course.course_description', compact('course_description'));
    }
}
