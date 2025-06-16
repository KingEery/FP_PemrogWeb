<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventsDescription;
use Illuminate\Http\Request;

class EventController extends Controller
{
   // Menampilkan list event (homepage)
    public function index()
    {
        $events = Event::all();
        return view('event.event', compact('events'));
    }

    // Menampilkan detail event
    public function show($id)
    {
        $event = Event::with('description')->findOrFail($id);
        return view('event.event_description', compact ('event'));

    }
}