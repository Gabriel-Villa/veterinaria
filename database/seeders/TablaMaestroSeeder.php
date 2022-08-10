<?php

namespace Database\Seeders;

use App\Models\TablaMaestro;
use Illuminate\Database\Seeder;

class TablaMaestroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TablaMaestro::insert(['texto' => 'Tipo Pago']);
        TablaMaestro::insert(['texto' => 'FeedBack']);
    }
}
