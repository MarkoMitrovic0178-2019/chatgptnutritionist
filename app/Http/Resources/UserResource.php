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
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->resource->id,
            'name'=>$this->resource->name,
            'age'=>$this->resource->age,
            'gender'=>$this->resource->gender,
            'height'=>$this->resource->height,
            'weight'=>$this->resource->weight,
            'activity_level'=>$this->resource->activity_level,
            'goals'=>$this->resource->goals,
            'medical_conditions'=>$this->resource->medical_conditions,
        ];
    }
}
