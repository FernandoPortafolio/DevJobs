<?php

namespace Database\Seeders;

use App\Models\Salario;
use Illuminate\Database\Seeder;

class SalarioSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Salario::create([
            'nombre' => '0 a 1000 UDS'
        ]);
        Salario::create([
            'nombre' => '1000 a 2000 UDS'
        ]);
        Salario::create([
            'nombre' => '2000 a 4000 UDS'
        ]);
        Salario::create([
            'nombre' => 'No Mostrar'
        ]);
    }
}
