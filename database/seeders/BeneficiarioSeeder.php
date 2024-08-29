<?php

namespace Database\Seeders;

use App\Models\Beneficiario;
use App\Models\Tarjeta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeneficiarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Beneficiario::factory(10)->has(Tarjeta::factory())->create();
    }
}
