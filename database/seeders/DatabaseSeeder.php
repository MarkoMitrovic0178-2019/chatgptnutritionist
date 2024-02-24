<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  \App\Models\User;
use \App\Models\DietPlan;
use \App\Models\Meal;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      $user=User::factory()->create();
      $dplan1=DietPlan::factory()->create();
      $dplan2=DietPlan::factory()->create();
      $meal1=Meal::factory(4)->create([
        'user_id'=>$user->id,
        'diet_plan_id'=>$dplan1->id,
      ]);
      $meal2=Meal::factory(3)->create([
        'user_id'=>$user->id,
        'diet_plan_id'=>$dplan2->id,
      ]);

       

    } 
}
