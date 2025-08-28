<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

       
        $permissions = [
             // Permisos generales
             'permissions.index', 'permissions.store', 'permissions.update', 'permissions.delete',
             'role.index', 'role.store', 'role.update', 'role.delete',
 
             // Permisos relacionados con usuarios
             'usuario.index', 'usuario.store', 'usuario.update', 'usuario.delete',
        ];

        // Asigna los permisos al rol de administrador
        foreach ($permissions as $permission) {
            $perm = Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
            $adminRole->givePermissionTo($perm);
        }
    }
}