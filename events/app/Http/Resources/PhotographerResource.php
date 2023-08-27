<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhotographerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public static $wrap = 'photographer';
    public function toArray(Request $request)
    {
        return [
            'first_name' =>$this->resource->first_name,
            'last_name' =>$this->resource->last_name,
            'email'=>$this->resource->email,
            'price_per_hour'=>$this->resource->price_per_hour,
            'equipment'=>$this->resource->equipment,
        ];
    }
}
