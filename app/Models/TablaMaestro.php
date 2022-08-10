<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TablaMaestro extends Model
{
    use HasFactory;

    protected $table = 'tabla_maestra';
    public $timestamps = false;

    public function scopeById($query, $id)
    {
        return $query->where('tabla_maestra.id_maestro', $id);
    }

}
