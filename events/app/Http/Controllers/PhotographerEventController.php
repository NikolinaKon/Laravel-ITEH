<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class PhotographerEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($photographer_id)
    {
        $events = Event::get()->where('photographer_id', $photographer_id);
        if(is_null($events)){
            return response()->json('Data not found', 404);
        }
        return response()->json($events);
    }

    
}
