<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nombre' => 'Frontend'
        ]);
        Categoria::create([
            'nombre' => 'Backend'
        ]);
        Categoria::create([
            'nombre' => 'Full Stack'
        ]);
        Categoria::create([
            'nombre' => 'DevOps'
        ]);
        Categoria::create([
            'nombre' => 'DBA'
        ]);
        Categoria::create([
            'nombre' => 'UI / UX'
        ]);
        Categoria::create([
            'nombre' => 'Teach Lead'
        ]);
    }
}
