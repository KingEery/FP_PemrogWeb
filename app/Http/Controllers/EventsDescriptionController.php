<?php

namespace App\Http\Controllers;

use App\Models\EventsDescription;
use Illuminate\Http\Request;

class EventsDescriptionController extends Controller
{
    // Display all events (index page)
    public function index()
    {
        $events_description = EventsDescription::all(); // Use plural to indicate a Collection
        return view('event.event_description', compact('events_description')); // New view for listing events
    }

    // Display a single event's details
    public function show($id)
    {
        $events_description = EventsDescription::findOrFail($id); // Single model instance
        return view('event.event_description', compact('events_description')); // Use the existing view
    }
}


