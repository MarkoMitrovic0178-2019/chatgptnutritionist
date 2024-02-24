<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meal>
 */
class MealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'name' => $this->faker->sentence(),
                'description' => $this->faker->paragraph(),
                'date' => $this->faker->date(),
                'time' => $this->faker->time(),
                'calories' => $this->faker->numberBetween(100, 1000),
                'carbohydrates' => $this->faker->numberBetween(0, 100),
                'proteins' => $this->faker->numberBetween(0, 100),
                'fats' => $this->faker->numberBetween(0, 100),
                'fiber' => $this->faker->numberBetween(0, 100),
        ];
    }
}
