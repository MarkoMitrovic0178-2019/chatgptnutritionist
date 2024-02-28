<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Meal extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        "description",
        "date",
        "time",
        "calories",
        "carbohydrates",
        "proteins",
        "fats",
        "fiber",
        "user_id",
        "diet_plan_id"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function diet_plan()
    {
        return $this->belongsTo(DietPlan::class);
    }
}
