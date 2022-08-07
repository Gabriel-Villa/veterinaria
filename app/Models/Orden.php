<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;
    protected $table = 'orden';
    public $timestamps = false;

    public function scopeById($query, $id)
    {
        return $query->where('orden.id_orden', $id);
    }

    public function scopeByIdCliente($query, $id)
    {
        return $query->where('orden.id_cliente', $id);
    }

    public function cliente()
    {
        return $this->hasOne(User::class, 'id', 'id_cliente');
    }

    public function detalle()
    {
        return $this->belongsTo(OrdenDetalle::class, 'id_orden', 'id_orden_detalle');
    }


}
