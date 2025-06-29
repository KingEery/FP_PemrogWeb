<?php
// app/Http/Controllers/MentoringController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MentoringDescription;
use App\Models\Consultant; 

class MentoringController extends Controller
{
    public function index()
    {
        // Ambil data mentoring
        $mentorings = MentoringDescription::where('is_active', true)->get();

        // Ambil data consultants
        $consultants = Consultant::where('is_active', true)->get();
        
        return view('mentoring.mentoring', compact('mentorings', 'consultants'));
    }
    
    public function show($id)
    {
        $mentoring = MentoringDescription::findOrFail($id);
        return view('mentoring.mentoring_mendaftar', compact('mentoring'));
    }
    
    // API endpoint untuk mendapatkan data consultants
    public function getConsultants()
    {
        $consultants = Consultant::where('is_active', true)->get();
        return response()->json($consultants);
    }
}