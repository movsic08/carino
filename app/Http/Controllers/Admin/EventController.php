<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{

    public function createEvent()
    {
        if (Auth::check()) {
            if (Auth::user()->usertype == 1) {
                return view('admin.events.create-event');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function storeEvent(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'participants' => 'required|string',
            'event_location' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            // Add more validation rules as needed
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->route('create-event')
                ->withErrors($validator)
                ->withInput();
        }

        // Create the event
        $event = Event::create($request->all());

        // If you want to save the event to the database
        if ($event->save()) {
            return back()->with('message', 'Event created successfully!');
        } else {
            return back()->with('error', 'Failed to create event. Please try again.');
        }
    }


    public function eventCalendar()
    {
        $events = Event::all();

        return view('admin.events.event-calendar', compact('events'));
    }

}