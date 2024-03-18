<?php

namespace App\Http\Controllers;

use App\Http\Resources\DietPlanCollection;
use App\Http\Resources\MealCollection;
use App\Models\Meal;
use Illuminate\Http\Request;

class DietPlanMealController extends Controller
{
    public function index($diet_plan_id)
    {
        $meals = Meal::get()->where('diet_plan_id', $diet_plan_id);
        if (is_null($meals)) {
            return response()->json('Data not found', 404);
        }
        return new MealCollection($meals);
    }
}
