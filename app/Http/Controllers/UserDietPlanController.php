<?php

namespace App\Http\Controllers;

use App\Http\Resources\DietPlanCollection;
use App\Models\DietPlan;
use Illuminate\Http\Request;

class UserDietPlanController extends Controller
{
    public function index($diet_plan_id)
    {
        $dietPlans = DietPlan::get()->where('id', $diet_plan_id);
        if (is_null($dietPlans)) {
            return response()->json('Data not found', 404);
        }
        return new DietPlanCollection($dietPlans);
    }
}
