<?php

namespace App\Http\Controllers;

use App\Http\Resources\DietPlanCollection;
use App\Http\Resources\DietPlanResource;
use App\Models\DietPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DietPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dietPlans = DietPlan::all();
        return new DietPlanCollection($dietPlans);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function showByGoal($goal)
    {
        $dietPlans = DietPlan::where('goal', $goal)->get();

        if ($dietPlans->isEmpty()) {
            return response()->json(['message' => 'No diet plans found with the specified goal.'], 404);
        }

        return new DietPlanCollection($dietPlans);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|string|max:255",
            "description" => "nullable|string",
            "duration" => "required",
            "goal" => "required",
            "total_calories" => "required",
            "carbohydrates_percentage" => "required",
            "proteins_percentage" => "required",
            "fats_percentage" => "required",
        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $dietPlan = DietPlan::create([
            "name" => $request->name,
            "description" => $request->description,
            "duration" => $request->duration,
            "goal" => $request->goal,
            "total_calories" => $request->total_calories,
            "carbohydrates_percentage" => $request->carbohydrates_percentage,
            "proteins_percentage" => $request->proteins_percentage,
            "fats_percentage" => $request->fats_percentage,
        ]);

        return response()->json(['Diet plan created successfully', new DietPlanResource($dietPlan)]);
    }

    /**
     * Display the specified resource.
     */
    public function show(DietPlan $dietPlan)
    {
        return new DietPlanResource($dietPlan);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DietPlan $dietPlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DietPlan $dietPlan)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|string|max:255",
            "description" => "nullable|string",
            "duration" => "required|integer",
            "goal" => "required|string",
            "total_calories" => "required|integer",
            "carbohydrates_percentage" => "required|integer",
            "proteins_percentage" => "required|integer",
            "fats_percentage" => "required|integer",
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $dietPlan->update([
            "name" => $request->name,
            "description" => $request->description,
            "duration" => $request->duration,
            "goal" => $request->goal,
            "total_calories" => $request->total_calories,
            "carbohydrates_percentage" => $request->carbohydrates_percentage,
            "proteins_percentage" => $request->proteins_percentage,
            "fats_percentage" => $request->fats_percentage,
        ]);

        return response()->json(['Diet plan updated successfully', new DietPlanResource($dietPlan)]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DietPlan $dietPlan)
    {
        $dietPlan->delete();
        return response()->json('Diet plan deleted successfully');
    }
}
