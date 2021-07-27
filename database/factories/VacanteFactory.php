<?php

namespace Database\Factories;

use App\Models\Vacante;
use Illuminate\Database\Eloquent\Factories\Factory;

class VacanteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vacante::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence(),
            'descripcion' => $this->faker->paragraph(),
            'skills' => 'HTML5,CSS3,CSSGrid,Flexbox,JavaScript,jQuery,Node,Angular,VueJS,ReactJS',
            'image' => $this->faker->imageUrl(640, 480, 'animals', true),
            'categoria_id' => $this->faker->numberBetween(1, 7),
            'experiencia_id' => $this->faker->numberBetween(1, 8),
            'ubicacion_id' => $this->faker->numberBetween(1, 7),
            'salario_id' => $this->faker->numberBetween(1, 4),
            'activa' => $this->faker->numberBetween(0, 1),
            'user_id' => 1,
        ];
    }
}
