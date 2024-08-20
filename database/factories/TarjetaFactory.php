<?php

namespace Database\Factories;

use App\Models\Beneficiario;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tarjeta>
 */
class TarjetaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numero_tarjeta' => $this->faker->creditCardNumber(),
            'tipoUsuario_tarjeta' => $this->faker->word(),
            'monto_tarjeta' => $this->faker->numerify(),
            'mesesPendientes_tarjeta' => 0,
            'id_beneficiario' => Beneficiario::factory(),
            'proximoPago_tarjeta' => Carbon::now()->addMonth(),
        ];
    }
}
