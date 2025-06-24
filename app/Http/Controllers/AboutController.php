<?php

namespace App\Http\Controllers;

use App\Models\AboutSection;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = AboutSection::first();
        $team = TeamMember::all();
        return view('about.about', compact('about', 'team'));
    }
}
