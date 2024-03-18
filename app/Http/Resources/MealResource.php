<?php

namespace App\Http\Resources;

use App\Models\DietPlan;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MealResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public static $wrap = 'meals';

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'diet_plan' => new DietPlanResource($this->resource->diet_plan),
            'description' => $this->resource->description,
            'date' => $this->resource->date,
            'time' => $this->resource->time,
            'calories' => $this->resource->calories,
            'carbohydrates' => $this->resource->carbohydrates,
            'proteins' => $this->resource->proteins,
            'fats' => $this->resource->fats,
            'fiber' => $this->resource->fiber,
            'user' => new UserResource($this->resource->user)
        ];
    }
}
