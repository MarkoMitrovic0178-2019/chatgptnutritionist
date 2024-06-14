<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


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


    public function changePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Hash and update the password
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['message' => 'Password changed successfully'], 200);
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
            "medical_conditions" => "required|text",
            "diet_plan_id" => "required"
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
            "medical_conditions" => $request->medical_conditions,
            "diet_plan_id" => $request->diet_plan_id
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

        if (is_null($user)) {
            return response()->json('Data not found', 404);
        }
        return new UserResource($user);
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
            "name" => "string|max:255",
            "email" => "string|max:255",
            "password" => "password",
            "age" => "integer",
            "gender" => "string",
            "height" => "numeric",
            "weight" => "numeric",
            "activity_level" => "integer",
            "goals" => "string",
            "medical_conditions" => "text",
            "diet_plan_id" => "integer"
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        if ($request->name) $user->name = $request->name;

        if ($request->name) $user->email = $request->email;
        if ($request->password) $user->password = $request->password;
        if ($request->age) $user->age = $request->age;
        if ($request->gender) $user->gender = $request->gender;
        if ($request->height) $user->height = $request->height;
        if ($request->weight) $user->weight = $request->weight;
        if ($request->activity_level) $user->activity_level = $request->activity_level;
        if ($request->goals) $user->goals = $request->goals;
        if ($request->medical_conditions) $user->medical_conditions = $request->medical_conditions;
        if ($request->diet_plan_id) $user->diet_plan_id = $request->diet_plan_id;

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
