<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pedido extends Model
{
    use HasFactory;

    // Indicamos la tabla si no sigue el plural en inglés
    protected $table = 'pedidos';
    
    // Indicamos la clave primaria personalizada
    protected $primaryKey = 'idPedido';

    // Campos que permitimos llenar masivamente
    protected $fillable = [
        'codigo_pedido',
        'idUsuario',
        'diaPedido',
        'estado',
        'total'
    ];

    // Desactivamos timestamps si tu tabla no tiene created_at/updated_at
    public $timestamps = false;

    // Relación con los items del pedido
    public function items()
    {
        return $this->hasMany(PedidoItem::class, 'idPedido', 'idPedido');
    }
    public function usuario()
{
    // Asegúrate de que 'idUsuario' sea el nombre de la columna en tu tabla pedidos
    return $this->belongsTo(User::class, 'id'); 
}
}