<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public static $wrap = 'event';
    public function toArray(Request $request)
    {
        return [
            'id' =>$this->resource->id,
            'event_type'=>$this->resource->event_type,
            'place'=>$this->resource->place,
            'date'=>$this->resource->date,  
            'user'=>new UserResource($this->resource->user),
            'photographer'=>new PhotographerResource($this->resource->photographer)
        ];
    }
}
