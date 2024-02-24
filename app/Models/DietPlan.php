<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DietPlan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'description', 'duration', 'goal', 'total_calories', 'carbohydrates_percentage', 'proteins_percentage', 'fats_percentage'
    ];

    public function user()
    {
        return $this->belongsToMany(Users::class); 
    }
    public function meals()
    {
        return $this->hasMany(Meal::class);
    }

}
