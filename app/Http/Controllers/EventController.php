<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EventController extends Controller
{
    public function index(Event $events)
    {
        $events = Event::all();
        return Inertia::render('events.index', [
            'events' => $events,
        ]);
    }
 
    public function create(Request $request)
    {
        Event::create($request->validate([
            'name' => ['required', 'max:50'],
            'description' => ['required', 'max:50'],
            'date' => ['required', 'date'],
          ]));
  
          return to_route('events.index');
    }

    public function edit(string $id)
    {
        return view('event.edit', ['event' => $id]);
    }
}