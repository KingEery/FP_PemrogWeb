<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;

class CourseContentController extends Controller
{
    public function index()
    {
        $materis = Materi::all();
        return view('course.course_content', compact('materis'));
    }
}
