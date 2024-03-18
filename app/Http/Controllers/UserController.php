<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|string|max:255",
            "email" => "required|string|max:255",
            "password" => "required|password",
            "age" => "required|integer",
            "gender" => "required|string",
            "height" => "required|float",
            "weight" => "required|float",
            "activity_level" => "required|string",
            "goals" => "required|string",
            "medical_conditions" => "required|text"
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
            "age" => $request->age,
            "gender" => $request->gender,
            "height" => $request->height,
            "weight" => $request->weight,
            "activity_level" => $request->activity_level,
            "goals" => $request->goals,
            "medical_conditions" => $request->medical_conditions
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user_id)
    {
        $user = User::find($user_id);
        if (is_null($user)) {
            return response()->json('Data not found', 404);
        }
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|string|max:255",
            "email" => "required|string|max:255",
            "password" => "required|password",
            "age" => "required|integer",
            "gender" => "required|string",
            "height" => "required|float",
            "weight" => "required|float",
            "activity_level" => "required|string",
            "goals" => "required|string",
            "medical_conditions" => "required|text"
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->age = $request->age;
        $user->gender = $request->gender;
        $user->height = $request->height;
        $user->weight = $request->weight;
        $user->activity_level = $request->activity_level;
        $user->goals = $request->goals;
        $user->medical_conditions = $request->medical_conditions;
        $user->save();
        return response()->json(['User updated successfully', new UserResource($user)]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json('Meal deleted successfully');
    }
}
