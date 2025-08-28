<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use Spatie\Permission\Contracts\Role as RoleContract;
use Spatie\Permission\Exceptions\GuardDoesNotMatch;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use Spatie\Permission\Exceptions\RoleAlreadyExists;
use Spatie\Permission\Exceptions\RoleDoesNotExist;
use Spatie\Permission\Guard;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\RefreshesPermissionCache;
use Spatie\Permission\Models\Role as SpatieRole;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    // Aquí puedes personalizar el modelo si es necesario
}

class Role extends SpatieRole
{
    use HasFactory, HasPermissions, RefreshesPermissionCache;

    // Definir los atributos rellenables
    protected $fillable = ['name', 'guard_name','descripcion'];

    // Sobrescribir la tabla si es necesario (de lo contrario, usa la predeterminada 'roles')
    protected $table = 'roles';

    /**
     * Relación con los permisos.
     * Un rol puede tener muchos permisos.
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'role_has_permissions');
    }

    /**
     * Relación con los usuarios.
     * Un rol puede pertenecer a muchos usuarios.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'model_has_roles', 'role_id', 'model_id');
    }
}