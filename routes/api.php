<?php

use App\Http\Controllers\MealController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserMealController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\DietPlanController;
use App\Http\Controllers\DietPlanMealController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::get('/meals', [MealController::class, 'index']);
// Route::get('/meals/{id}', [MealController::class, 'show']);
// Route::resource('meals',MealController::class);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });
    Route::resource('meals', MealController::class)->only(['update', 'store', 'destroy']);
    Route::resource('dietPlans', DietPlanController::class)->only(['update', 'store', 'destroy']);
    Route::resource('users', UserController::class)->only('destroy');
    Route::resource('users', UserController::class)->only(['index', 'show']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
Route::get('/users/{user_id}', [UserController::class, 'show'])->name('users.show');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}/meals', [UserMealController::class, 'index'])->name('users.meals.index');
Route::resource('meals', MealController::class)->only(['index', 'show']);
Route::get('/dietPlans/{id}/meals', [DietPlanMealController::class, 'index'])->name('dietPlans.meals.index');
Route::resource('dietPlans', DietPlanController::class)->only(['index', 'show']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
