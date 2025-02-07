<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\FakeCar;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $this->faker->addProvider(new FakeCar($this->faker));
        $vehicle = $this->faker->vehicleArray();
        $isRegistered = $this->faker->boolean(70);

        return [
            'name' => $vehicle['brand'] . ' ' . $vehicle['model'],
            'is_registered' => $isRegistered,
            'registration_number' => $isRegistered ? $this->faker->vehicleRegistration : null,
        ];
    }
}
