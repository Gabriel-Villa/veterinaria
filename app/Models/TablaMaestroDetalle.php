<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TablaMaestroDetalle extends Model
{
    use HasFactory;

    protected $table = 'tabla_maestra_detalle';
    public $timestamps = false;

    public function scopeById($query, $id)
    {
        return $query->where('tabla_maestra_detalle.id_maestro_detalle', $id);
    }

    public function scopeByIdMaestro($query, $id)
    {
        return $query->where('tabla_maestra_detalle.id_maestro', $id);
    }

}
