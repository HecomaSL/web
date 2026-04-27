<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cupon extends Model {
    public $timestamps = false;
    protected $table = 'cupones';
    protected $fillable = [
        'nombre', 'fechaInicio', 'fechaFin', 'tipo', 
        'valor', 'usos_maximos', 'usos_actuales', 
        'activo', 'minimo_pedido'
    ];
}