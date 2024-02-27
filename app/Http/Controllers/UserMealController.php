<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;

class UserMealController extends Controller
{
    public function index($user_id){
        $meals=Meal::get()->where('user_id',$user_id);
        if(is_null($meals)){
            return response()->json('Data not found',404);
        }
        return response()->json($meals);
    }
}
