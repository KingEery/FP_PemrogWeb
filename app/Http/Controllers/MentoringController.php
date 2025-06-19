<?php

namespace App\Http\Controllers;

use App\Models\Mentoring;
use App\Models\MentoringDescription;
use Illuminate\Http\Request;

class MentoringController extends Controller
{
    public function index()
    {
        $mentorings = Mentoring::all();
        return view('mentoring.mentoring', compact('mentorings'));

    }

    // app/Http/Controllers/MentoringController.php
    public function show($id)
    {
        $mentoring = Mentoring::with('mentoringDescription')->findOrFail($id);

        // Pastikan description ada
        if (!$mentoring->description) {
            abort(404, 'Deskripsi mentoring tidak ditemukan');
        }

        return view('mentoring.mentoring_mendaftar', compact('mentoring'));
    }
}
