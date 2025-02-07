<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Part>
 */
class PartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $car = Car::inRandomOrder()->first();
        return [
            'name' => fake()->word(),
            'serial_number' => fake()->unique()->regexify('[A-Z0-9]{10}'),
            'car_id' => $car->id,
        ];
    }
}
