<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventsDescription;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of events
     */
    public function index(Request $request)
    {
        $query = Event::with('description');

        // Filter by category if provided
        if ($request->has('category') && $request->category !== 'all') {
            $query->byCategory($request->category);
        }

        // Only show upcoming events by default
        $events = $query->upcoming()
                       ->orderBy('date', 'asc')
                       ->get();

        return view('event.event', compact('events'));
    }

    /**
     * Display the specified event
     */
    public function show($id)
    {
        $event = Event::with('description')->findOrFail($id);
        
        // If event doesn't have description, redirect or show error
        if (!$event->description) {
            abort(404, 'Event details not found');
        }

        return view('event.event_description', compact('event'));
    }

    /**
     * Get events by category (API endpoint)
     */
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

    /**
     * Get upcoming events
     */
    public function getUpcoming()
    {
        $events = Event::with('description')
                      ->upcoming()
                      ->orderBy('date', 'asc')
                      ->take(6)
                      ->get();

        return response()->json($events);
    }

    /**
     * Search events
     */
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

