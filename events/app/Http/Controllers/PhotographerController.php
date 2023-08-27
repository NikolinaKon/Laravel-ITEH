<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResource;
use App\Http\Resources\PhotographerCollection;
use App\Http\Resources\PhotographerResource;
use App\Models\Event;
use App\Models\Photographer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PhotographerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photographers =Photographer::all();
        return new PhotographerCollection($photographers);
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
     */
    public function store(Request $request)
    {
       
        $photographer = Photographer::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email'=>$request->email,
            'price_per_hour'=>$request->price_per_hour,
            'equipment'=>$request->equipment,
        ]);

        return new PhotographerResource($photographer);
    }

    /**
     * Display the specified resource.
     */
    public function show(Photographer $photographer)
    {
        return new PhotographerResource($photographer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photographer $photographer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Photographer $photographer)
    {
        
        $validator = Validator::make($request->all(),[
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|string',
        'price_per_hour' => 'required|float',
        'equipment' => 'required|string',
    ]);

    if($validator->fails()){
        return response()->json($validator->errors());
    }

    $photographer->first_name = $request->first_name;
    $photographer->price_per_hour = $request->price_per_hour;
    $photographer->email = $request->email;
    $photographer->last_name = $request->last_name;
    $photographer->equipment = $request->equipment;

    $photographer->update();
    return response()->json(['Photographer updated successfully', new PhotographerResource($photographer)]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photographer $photographer)
    {
        $photographer->delete();
        return response()->json('Photographer deleted successfully');
    }
    }

