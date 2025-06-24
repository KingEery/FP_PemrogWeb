<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamMember;
use App\Models\AboutSection;

class TeamMemberController extends Controller
{
    public function index()
    {
        $about = AboutSection::first();
        $team = TeamMember::all(); // ambil semua data tim

        return view('about.about', compact('about', 'team'));
    }
}
