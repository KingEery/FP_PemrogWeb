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

    
    public function getByCategory(Request $request)
    {
        $category = $request->get('category', 'all');
        
        $query = Event::with('description');
        
        if ($category !== 'all') {
            $query->byCategory($category);
        }
        
        $events = $query->upcoming()
                       ->orderBy('date', 'asc')
                       ->get();

        return response()->json($events);
    }

    
    public function getUpcoming()
    {
        $events = Event::with('description')
                      ->upcoming()
                      ->orderBy('date', 'asc')
                      ->take(6)
                      ->get();

        return response()->json($events);
    }

  
    public function search(Request $request)
    {
        $query = $request->get('q');
        
        $events = Event::with('description')
                      ->where('title', 'LIKE', "%{$query}%")
                      ->orWhereHas('description', function($q) use ($query) {
                          $q->where('title', 'LIKE', "%{$query}%")
                            ->orWhere('speaker_name', 'LIKE', "%{$query}%");
                      })
                      ->upcoming()
                      ->orderBy('date', 'asc')
                      ->get();

        return response()->json($events);
    }
}

