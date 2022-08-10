<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::insert(['nombre_categoria' => 'CATEGORIA 1',  'fecha_creacion' => date("Y-m-d")]);
        Categoria::insert(['nombre_categoria' => 'CATEGORIA 2',  'fecha_creacion' => date("Y-m-d")]);
        Categoria::insert(['nombre_categoria' => 'CATEGORIA 3',  'fecha_creacion' => date("Y-m-d")]);
        Categoria::insert(['nombre_categoria' => 'CATEGORIA 4',  'fecha_creacion' => date("Y-m-d")]);
        Categoria::insert(['nombre_categoria' => 'CATEGORIA 5',  'fecha_creacion' => date("Y-m-d")]);
    }
}
