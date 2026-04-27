<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model {
    use HasFactory;
    protected $table = 'productos';
    protected $fillable = [ 'referencia', 'tipo','familia','precio','stock', ];
    public $timestamps = true;
    protected $casts = [  'precio' => 'decimal:2', 'stock'  => 'string', ];
}