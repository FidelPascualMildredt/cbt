<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Keyboard>
 */
class KeyboardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'serial_number' => $this->faker->creditCardNumber,
            'model' => $this->faker->name,
            'brand' => $this->faker->randomElement(['Logitech', 'Mars Gaming MKXTKL', 'Razer Huntsman v2']),
            'connection_type' => $this->faker->randomElement(['PS/2', 'USB', 'Bluetooth']),
            'status' => $this->faker->randomElement(['Activo', 'Reparacion']),
            'location' => $this->faker->randomElement(['Laboratorio A', 'Laboratorio B']),
        ];
    }
}
