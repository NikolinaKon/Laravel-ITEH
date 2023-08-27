<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class UserEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($user_id)
    {
        $events = Event::get()->where('user_id', $user_id);
        if(is_null($events)){
            return response()->json('Data not found', 404);
        }
        return response()->json($events);
    }

}