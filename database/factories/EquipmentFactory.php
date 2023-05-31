<?php

namespace Database\Factories;
use App\Models\Keyboard;
use App\Models\Monitor;
use App\Models\Mouse;
use App\Models\Ordenador;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipment>
 */
class EquipmentFactory extends Factory
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
            'status' => $this->faker->randomElement(['Activo', 'Reparacion']),
            'QR' => $this->faker->randomElement(['||||||||||||']),
            'mouses_id'  => Mouse::all()->random()->id_mouses,
            'ordenadores_id' => Ordenador::all()->random()->iserial_number,
            'keyboards_id' => Keyboard::all()->random()->serial_number,
            'monitors_id' => Monitor::all()->random()->serial_number
        ];
    }
}
