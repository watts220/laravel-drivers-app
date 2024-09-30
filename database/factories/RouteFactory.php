<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Route>
 */
class RouteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'origin' => $this->faker->city(),
            'destination' => $this->faker->city(),
            'cost' => $this->faker->randomFloat(0, 10, 500),
            'date' => $this->faker->date(),
            'driver_id' => null,
        ];
    }
}
