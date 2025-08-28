<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
   use HasFactory, Notifiable, HasApiTokens,HasRoles;

    protected $primaryKey = 'id_usuario';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'email',
        'password',
        'activo',
        
    ];

    protected $hidden = [
        'password',
    ];

   
    /**
     * Casting de atributos.
     */
    protected $casts = [
        'fecha_creacion' => 'datetime',
        'activo' => 'boolean',
    ];

    /**
     * Mutator para encriptar la contraseña automáticamente cuando se asigne.
     */
    public function setContraseñaAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * Para que Laravel use 'contraseña' en vez de 'password' en autenticación,
     * redefinimos el método que obtiene la contraseña.
     */
    public function getAuthPassword()
    {
        return $this->password;
    }
}
