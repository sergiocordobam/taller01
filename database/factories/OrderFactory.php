<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'total' => $this->faker->numberBetween($min = 1000, $max = 9000),
        ];
    }
}
