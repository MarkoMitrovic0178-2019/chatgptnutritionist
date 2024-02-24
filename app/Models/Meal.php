<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'description', 'duration', 'goal', 'total_calories', 'carbohydrates_percentage', 'proteins_percentage', 'fats_percentage'
    ];

    public function user()
    {
        return $this->belongsTo(Users::class);
    }
    public function diet_plan()
    {
        return $this->belongs(DietPlan::class);
    }
}
