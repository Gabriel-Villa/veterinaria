<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenDetalle extends Model
{
    use HasFactory;

    protected $table = 'orden_detalle';
    public $timestamps = false;

    public function orden()
    {
        return $this->hasOne(Orden::class, 'id_orden', 'id_orden');
    }

    public function producto()
    {
        return $this->hasOne(Producto::class, 'id_producto', 'id_producto');
    }

    public function metodo_pago()
    {
        return $this->hasOne(TablaMaestroDetalle::class, 'id_maestro_detalle', 'id_metodo_pago');
    }

}
