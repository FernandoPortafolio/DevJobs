<?php

namespace Database\Seeders;

use App\Models\Experiencia;
use Illuminate\Database\Seeder;

class ExperienciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Experiencia::create([
            'nombre' => '0 - 6 meses'
        ]);
        Experiencia::create([
            'nombre' => '6 meses - 1 año'
        ]);
        Experiencia::create([
            'nombre' => '1 - 3 años'
        ]);
        Experiencia::create([
            'nombre' => '3 - 5 años'
        ]);
        Experiencia::create([
            'nombre' => '5 - 7 años'
        ]);
        Experiencia::create([
            'nombre' => '7 - 10 años'
        ]);
        Experiencia::create([
            'nombre' => '10 - 12 años'
        ]);
        Experiencia::create([
            'nombre' => '12 - 15 años'
        ]);
    }
}
