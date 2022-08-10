<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenFeedback extends Model
{
    use HasFactory;

    protected $table = 'orden_feedback';
    public $timestamps = false;

    public function orden()
    {
        return $this->hasOne(Orden::class, 'id_orden', 'id_orden');
    }

    public function tipo_feedback()
    {
        return $this->hasOne(TablaMaestroDetalle::class, 'id_maestro_detalle', 'id_tipo_feedback');
    }

    public function scopeByOrden($query, $id_orden)
    {
        return is_array($id_orden)
            ? $query->whereIn('orden_feedback.id_orden', $id_orden)
            : $query->where('orden_feedback.id_orden', $id_orden);
        
    }

}
