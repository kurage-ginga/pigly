<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WeightLogFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => null,
            'date' => $this->faker->dateTimeBetween('-35 days', 'now')->format('Y-m-d'),
            'weight' => $this->faker->randomFloat(1, 45, 80),
            'calories' => $this->faker->numberBetween(1500, 3000),
            'exercise_time' => $this->faker->time(),
            'exercise_content' => $this->faker->sentence(),
        ];
    }
}
