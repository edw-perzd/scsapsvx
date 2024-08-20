<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Beneficiario>
 */
class BeneficiarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_beneficiario' => $this->faker->name(),
            'aPaterno_beneficiario' => $this->faker->lastName(),
            'aMaterno_beneficiario' => $this->faker->lastName(),
            'direccion_beneficiario' => $this->faker->address(),
            'colonia_beneficiario' => $this->faker->country(),
            'latitud_beneficiario' => $this->faker->numerify(),
            'longitud_beneficiario' => $this->faker->numerify(),
        ];
    }
}
