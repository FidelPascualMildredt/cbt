<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ordenador>
 */
class OrdenadorFactory extends Factory
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
            'brand' => $this->faker->randomElement(['Logitech', 'Microsoft', 'Razer']),
            'ram' => $this->faker->randomElement(['8GB', '16GB', '32GB']),
            'processor' => $this->faker->randomElement(['Intel Core i5', 'AMD Ryzen 7', 'Apple M1']),
            'hard_disk' => $this->faker->randomElement(['HDD', 'SSD']),
            'network_connection' => $this->faker->randomElement(['Ethernet', 'Wi-Fi']),
            'location' => $this->faker->randomElement(['Laboratorio A', 'Laboratorio B']),
        ];
    }
}
