<?php

namespace Database\Seeders;

use App\Models\TablaMaestroDetalle;
use Illuminate\Database\Seeder;

class TablaMaestroDetalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1 Tipo pago
        TablaMaestroDetalle::insert(['id_maestro' => 1, 'valor' => 'Efectivo']);
        TablaMaestroDetalle::insert(['id_maestro' => 1, 'valor' => 'Tarjeta']);
        TablaMaestroDetalle::insert(['id_maestro' => 1, 'valor' => 'Yape']);

        // 2 Feedback
        TablaMaestroDetalle::insert(['id_maestro' => 2, 'valor' => 'Reclamo']);
        TablaMaestroDetalle::insert(['id_maestro' => 2, 'valor' => 'Comentaria']);

    }
}
