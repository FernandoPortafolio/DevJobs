<?php

namespace Database\Seeders;

use App\Models\Ubicacion;
use Illuminate\Database\Seeder;

class UbicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ubicacion::create([
            'nombre' => 'Remoto'
        ]);
        Ubicacion::create([
            'nombre' => 'Estados Unidos'
        ]);
        Ubicacion::create([
            'nombre' => 'Canadá'
        ]);
        Ubicacion::create([
            'nombre' => 'México'
        ]);
        Ubicacion::create([
            'nombre' => 'Colombia'
        ]);
        Ubicacion::create([
            'nombre' => 'Argentina'
        ]);
        Ubicacion::create([
            'nombre' => 'España'
        ]);
    }
}
