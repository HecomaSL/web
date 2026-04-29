<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model {
    use HasFactory;
    /**
     * La tabla asociada al modelo.
     */
    protected $table = 'tickets';

    /**
     * Los atributos que se pueden asignar de forma masiva.
     * Estos deben coincidir con las columnas de tu migración.
     */
    protected $fillable = [ 'user_id', 'titulo', 'problema', 'estado', ];

    /**
     * Obtener el usuario al que pertenece el ticket.
     * Relación Inversa (Muchos a Uno)
     */
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    /**
     * Formatear la fecha para que sea legible en Vue/Inertia.
     * Esto crea un atributo virtual llamado 'fecha_formateada'
     */
    protected $appends = ['fecha_formateada'];

    public function getFechaFormateadaAttribute() {
        return $this->created_at ? $this->created_at->diffForHumans() : null;
    }
}