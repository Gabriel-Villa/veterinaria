<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categoria';
    public $timestamps = false;

    public function scopeById($query, $id)
    {
        return is_array($id) 
            ? $query->whereIn('categoria.id_categoria', $id)
            : $query->where('categoria.id_categoria', $id); 
    }

    public function scopeActiva($query, $estado = 1)
    {
        return $query->where('categoria.estado', $estado = 1); 
    }

}
