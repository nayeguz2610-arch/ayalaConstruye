<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obras extends Model
{
    protected $primaryKey = 'id_obra'; 

    // Opcional: si no usas incrementos automáticos
    //public $incrementing = true;

    // Opcional: si tu clave no es tipo integer
    //protected $keyType = 'int';
    protected $fillable = [
    'nombre',
    'tipo_obra',
    'descripcion',
    'localidad',
    'latitud',
    'longitud',
    'año',
    'estatus',
    'presupuesto',
    'contratista',
    'fecha_inicio',
    'fecha_fin',
    'usuario_creador',
    ];

    public function creador()
    {
        return $this->belongsTo(User::class, 'usuario_creador', 'id_usuario');
    }

}
