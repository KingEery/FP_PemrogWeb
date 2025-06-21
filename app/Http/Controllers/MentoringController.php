<?php

namespace App\Http\Controllers;

use App\Models\MentoringDescription;
use Illuminate\Http\Request;

class MentoringController extends Controller
{
    public function index()
    {
        $mentorings = MentoringDescription::where('is_active', true)->get();
        
        return view('mentoring.mentoring', compact('mentorings'));
    }

    public function show($id)
    {
        $mentoring = MentoringDescription::findOrFail($id);

        if (!$mentoring->is_active) {
            abort(404, 'Mentoring program not found');
        }

        return view('mentoring.mentoring_mendaftar', compact('mentoring'));
    }
}