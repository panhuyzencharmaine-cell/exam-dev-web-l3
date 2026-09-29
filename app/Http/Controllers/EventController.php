<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('event_date')->get();

        return view('events.index', [
            'events' => $events,
        ]);
    }

    public function show(int $id)
    {
        $event = Event::findOrFail($id);

        return view('events.show', [
            'event' => $event,
        ]);
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'required',
            'event_date' => 'required|date',
            'location' => 'nullable|string|max:150',
        ]);

        $event = Event::create($data);

        return redirect()->route('events.show', $event->id);
    }

    public function edit(int $id)
    {
        $event = Event::findOrFail($id);

        return view('events.edit', [
            'event' => $event,
        ]);
    }

    public function update(Request $request, int $id)
    {
        $event = Event::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'required',
            'event_date' => 'required|date',
            'location' => 'nullable|string|max:150',
        ]);

        $event->update($data);

        return redirect()->route('events.show', $event->id);
    }

    public function destroy(int $id)
    {
        $event = Event::findOrFail($id);

        $event->delete();

        return redirect()->route('events.index');
    }
}