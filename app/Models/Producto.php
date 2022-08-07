<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'producto';
    public $timestamps = false;

    protected $fillable = [
        'stock'
    ];

    public function categoria()
    {
        return $this->hasOne(Categoria::class, 'id_categoria', 'id_categoria');
    }
    
    public function proveedor()
    {
        return $this->hasOne(User::class, 'id', 'id_proveedor');
    }

    public function detalle()
    {
        return $this->belongsToMany(ProductoDetalle::class, 'id_producto', 'id_producto_detalle');
    }

    public function scopeById($query, $id)
    {
        return $query->where('producto.id_producto', $id);
    }

    public function scopeByStock($query, $simbolo = '>' , $cantidad = 0)
    {
        return $query->where('producto.stock', $simbolo, $cantidad);
    }

    public function scopeByCatergoria($query, $categoria)
    {
        return is_array($categoria) 
            ? $query->whereIn('producto.id_categoria', $categoria)
            : $query->where('producto.id_categoria', $categoria); 
    }

    public function scopeByProveedor($query, $proveedor)
    {
        return is_array($proveedor) 
            ? $query->whereIn('producto.id_proveedor', $proveedor)
            : $query->where('producto.id_proveedor', $proveedor); 
    }

    public function scopeByNombre($query, $nombre)
    {
        return $query->where('producto.nombre', $nombre);
    }

    public function scopeLikeNombre($query, $nombre)
    {
        return $query->where('nombre', 'Like', '%' . $nombre . '%');
    }

    
}
