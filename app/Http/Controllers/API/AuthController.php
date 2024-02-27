<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|email:rfc,dns|unique:users',
            'password' => 'required|string|min:8',
            'age'=>'integer',
            'gender' => 'string',
            'height' => 'float',
            'weight' => 'float',
            'activity_level' => 'string|max:255',
            'goals' => 'string|max:255',
            'medical_conditions' => 'text|max:255'
            

        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $user = User::create([
            'name'=> $request->username,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'age'=>$request->age,
            'gender'=>$request->gender,
            'height'=>$request->height,
            'weight'=>$request->weight,
            'activity_level'=>$request->activity_level,
            'goals'=>$request->goals,
            'medical_conditions'=>$request->medical_conditions,
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['data'=> $user, 'access_token'=> $token, 'token_type'=> 'Bearer']);
    }

    public function login(Request $request)
    {
        if(!Auth::attempt($request->only('email','password'))){
            return response()->json(['message'=> 'Unauthorized'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['data'=> $user, 'access_token'=> $token, 'token_type'=> 'Bearer']);
    }

    public function logout(Request $request)
    {
       $request->user()->tokens()->delete();
       return response()->json(['message'=> 'Successfully logged out!']);
    }
}
