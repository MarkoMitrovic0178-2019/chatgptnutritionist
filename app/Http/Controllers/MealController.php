<?php

namespace App\Http\Controllers;

use App\Http\Resources\MealCollection;
use App\Http\Resources\MealResource;
use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meals = Meal::all();
        return new MealCollection($meals);
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
        $validator = Validator::make($request->all(), [
            "name" => "required|string|max:255",
            "description" => "required",
            "date" => "required|date",
            "time" => "required|date_format:H:i:s",
            "calories" => "required",
            "carbohydrates" => "required",
            "proteins" => "required",
            "fats" => "required",
            "fiber" => "required",
            "diet_plan_id" => "required"
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $meal = Meal::create([
            "name" => $request->name,
            "description" => $request->description,
            "date" => $request->date,
            "time" => $request->time,
            "calories" => $request->calories,
            "carbohydrates" => $request->carbohydrates,
            "proteins" => $request->proteins,
            "fats" => $request->fats,
            "fiber" => $request->fiber,
            "user_id" => Auth::user()->id,
            "diet_plan_id" => $request->diet_plan_id,

        ]);
        return response()->json(['Meal created successfully', new MealResource($meal)]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Meal $meal)
    {
        // $meal= Meal::find($id);
        return new MealResource($meal);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meal $meal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Meal $meal)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|string|max:255",
            "date" => "required|date",
            "time" => "required|time",
            "calories" => "required|unsignedInteger",
            "carbohydrates" => "required|unsignedInteger",
            "proteins" => "required|unsignedInteger",
            "fats" => "required|unsignedInteger",
            "fiber" => "required|unsignedInteger",
            "diet_plan_id" => "required"
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $meal->name = $request->name;
        $meal->date = $request->date;
        $meal->time = $request->time;
        $meal->calories = $request->calories;
        $meal->carbohydrates = $request->carbohydrates;
        $meal->proteins = $request->proteins;
        $meal->fats = $request->fats;
        $meal->fiber = $request->fiber;
        $meal->diet_plan_id = $request->diet_plan_id;

        $meal->save();

        return response()->json(['Meal updated successfully', new MealResource($meal)]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meal $meal)
    {
        $meal->delete();
        return response()->json('Meal deleted successfully');
    }
}
