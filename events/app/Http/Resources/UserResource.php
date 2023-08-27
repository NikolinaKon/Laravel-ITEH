<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public static $wrap = 'user';
    public function toArray(Request $request)
    {
        return[
            'name' =>$this->resource->name,
            'last_name' =>$this->resource->last_name,
            'email'=>$this->resource->email,
            'year_of_birth'=>$this->resource->year_of_birth,  

        ];
    }
}
