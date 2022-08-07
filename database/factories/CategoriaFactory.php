<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categoria;

class CategoriaFactory extends Factory
{

    protected $model = Categoria::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        Categoria::insert(['nombre_categoria' => 'CATEGORIA 1',  'fecha_creacion' => $this->faker->date()]);
        Categoria::insert(['nombre_categoria' => 'CATEGORIA 2',  'fecha_creacion' => $this->faker->date()]);
        Categoria::insert(['nombre_categoria' => 'CATEGORIA 3',  'fecha_creacion' => $this->faker->date()]);
        Categoria::insert(['nombre_categoria' => 'CATEGORIA 4',  'fecha_creacion' => $this->faker->date()]);
        Categoria::insert(['nombre_categoria' => 'CATEGORIA 5',  'fecha_creacion' => $this->faker->date()]);
    }
}
