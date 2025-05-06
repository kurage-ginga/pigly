<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class WeightTargetFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => null,
            'target_weight' => $this->faker->randomFloat(1, 45, 80),
        ];
    }
}
