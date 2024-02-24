<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DietPlan>
 */
class DietPlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'name' => $this->faker->sentence,
                'description' => $this->faker->paragraph,
                'duration' => $this->faker->numberBetween(1, 30), // Duration in days
                'goal' => $this->faker->randomElement(['Weight Loss', 'Muscle Gain', 'Maintenance']),
                'total_calories' => $this->faker->numberBetween(1000, 3000),
                'carbohydrates_percentage' => $this->faker->numberBetween(20, 60),
                'proteins_percentage' => $this->faker->numberBetween(20, 40),
                'fats_percentage' => $this->faker->numberBetween(20, 40),
        ];
    }
}
