<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DietPlanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public static $wrap = 'dietPlans';
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            // 'description'=>$this->resource->description,
            // 'duration'=>$this->resource->duration,
            'goal' => $this->resource->goal,
            'total_calories' => $this->resource->total_calories,
            // 'carbohydrates_percentage'=>$this->resource->carbohydrates_percentage,
            // 'proteins_percentage'=>$this->resource->proteins_percentage,
            // 'fats_percentage'=>$this->resource->fats_percentage,
        ];
    }
}
