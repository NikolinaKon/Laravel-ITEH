<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventCollection;
use App\Http\Resources\EventResource;
use App\Models\Event;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events =Event::all();
        return new EventCollection($events);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 
     * Event
     * event
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'event_type' => 'required|string|max:255',
            'place' => 'required|max:30',
            'date' => 'required',
            'user_id' => 'required',
            'photographer_id' => 'required',

        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $event = Event::create([
            'event_type' => $request->event_type,
            'place' => $request->place,
            'date' => $request->date,
            'user_id' => Auth::user()->id,
            'photographer_id' => $request->photographer_id,
        ]);

        return response()->json(['Event created successfully', new EventResource($event)]);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return new EventResource($event);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        if(!is_null($request->subject)){
            $event->subject = $request->subject;
        }      
        if(!is_null($request->place)) 
        $event->place = $request->place;
        if(!is_null($request->date)) 
        $event->date = $request->date;
        if(!is_null($request->photographer_id)) 
        $event->photographer_id = $request->photographer_id;
        $event->update();
        return response()->json(['Event updated successfully', new EventResource($event)]);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return response()->json('Event deleted successfully');
    }
}
