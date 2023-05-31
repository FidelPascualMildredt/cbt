<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mouse>
 */
class MouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'serial_number' => $this->faker->creditCardNumber,
            'model' => $this->faker->randomElement(['Microsoft Surface Arc Mouse', 'Logitech MX Master 3', 'Razer DeathAdder Elite']),
            'brand' => $this->faker->randomElement(['Logitech', 'Microsoft: Microsoft', 'Razer']),
            'connection_type' => $this->faker->randomElement(['PS/2', 'USB', 'Bluetooth']),
            'status' => $this->faker->randomElement(['Activo', 'Reparacion']),
            'location' => $this->faker->randomElement(['Laboratorio A', 'Laboratorio B']),
        ];
    }
}
