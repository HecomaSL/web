<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// Actualizamos los campos permitidos para coincidir con tu tabla 'usuarios'
#[Hidden(['contrasena', 'remember_token'])]
#[Fillable(['nombre', 'email', 'contrasena', 'tlfn', 'direccion', 'nombreEmpresa'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;
    public $timestamps = false;
    /**
     * Nombre de la tabla asociada al modelo.
     */
    protected $table = 'usuarios';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'email',
        'password',
        'tlfn',
    ];
    
    /**
     * Sobrescribimos el método para que Laravel use 'contrasena' en lugar de 'password'.
     */
    public function getAuthPassword()
    {
        return $this->contrasena;
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            // Casteamos 'contrasena' como hashed para mantener la seguridad
            'contrasena' => 'hashed',
        ];
    }
}