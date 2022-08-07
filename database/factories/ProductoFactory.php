<?php

namespace Database\Factories;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{

    protected $model = Producto::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id =  User::role('proveedor')->get()->random()->id;
        $id_categoria = Categoria::inRandomOrder()->first();
        return [
            'nombre' => $this->faker->title(),
            'precio' => $this->faker->randomDigit(),
            'stock' => $this->faker->randomDigit(),
            'descripcion' => $this->faker->paragraph(),
            'imagen' => "1.jpg",
            'id_categoria' => $id_categoria,
            'id_proveedor' => $id,
        ];

    }
}
