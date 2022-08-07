<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoDetalle extends Model
{
    use HasFactory;

    protected $table = 'producto_detalle';
    public $timestamps = false;

    public function scopeByIdProducto($query, $id_producto)
    {
        return is_array($id_producto) 
            ? $query->whereIn("producto_detalle.id_producto", $id_producto)
            : $query->where("producto_detalle.id_producto", $id_producto);
    }

}
