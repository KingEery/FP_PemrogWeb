<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventsDescription;
use Illuminate\Http\Request;

class EventController extends Controller
{
    
    public function index(Request $request)
    {
        $query = Event::with('description');

        if ($request->has('category') && $request->category !== 'all') {
            $query->byCategory($request->category);
        }

        $events = $query->upcoming()
                       ->orderBy('date', 'asc')
                       ->get();

        return view('event.event', compact('events'));
    }

   
    public function show($id)
    {
        $event = Event::with('description')->findOrFail($id);
        
        if (!$event->description) {
            abort(404, 'Event details not found');
        }

        return view('event.event_description', compact('event'));
    }

    
}

