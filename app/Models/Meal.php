<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable = [
        'name', 'description', 'duration', 'goal', 'total_calories', 'carbohydrates_percentage', 'proteins_percentage', 'fats_percentage'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
