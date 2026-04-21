<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model {
    use HasFactory;

    /**
     * Nombre de la tabla en tu base de datos MariaDB.
     */
    protected $table = 'productos';

    /**
     * Atributos asignables masivamente.
     */
    protected $fillable = [ 
        'referencia', 
        'tipo', 
        'familia',
        'precio', 
        'stock', 
    ];

    /**
     * Activar timestamps si tienes created_at y updated_at.
     */
    public $timestamps = true;

    /**
     * Casts para asegurar tipos de datos correctos al enviar a Vue.
     */
    protected $casts = [ 
        'precio' => 'decimal:2', 
        'stock'  => 'string', // 'si' o 'no' según tu base de datos
    ];
}