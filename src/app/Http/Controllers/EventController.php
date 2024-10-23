<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
      // Get all events
      public function index() {
        return response()->json(Event::all(), 200);
    }

    // Get a specific event by ID
    public function show($id) {
        $event = Event::find($id);
        if ($event) {
            return response()->json($event, 200);
        }
        return response()->json(['error' => 'Event not found'], 404);
    }

    // Create a new event
    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required|string',
            'category' => 'required|string'
        ]);

        $event = Event::create($validated);
        return response()->json($event, 201);
    }

    // Update an existing event
    public function update(Request $request, $id) {
        $event = Event::find($id);
        if ($event) {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'date' => 'required|date',
                'time' => 'required',
                'location' => 'required|string',
                'category' => 'required|string'
            ]);
            $event->update($validated);
            return response()->json($event, 200);
        }
        return response()->json(['error' => 'Event not found'], 404);
    }

    // Delete an event
    public function destroy($id) {
        $event = Event::find($id);
        if ($event) {
            $event->delete();
            return response()->json(null, 204);
        }
        return response()->json(['error' => 'Event not found'], 404);
    }

    // Get events by category
    public function getByCategory($category) {
        $events = Event::where('category', $category)->get();
        return response()->json($events, 200);
    }
}
