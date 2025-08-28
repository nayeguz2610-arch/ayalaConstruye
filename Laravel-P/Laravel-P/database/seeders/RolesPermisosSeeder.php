<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class RolesPermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   
    public function run(): void
    {
        // Crear roles y guardar en variables
        $admin = Role::firstOrCreate(
            ['name' => 'admin'],
            ['guard_name' => 'web', 'descripcion' => 'Acceso total al sistema']
        );

        $ciudadano = Role::firstOrCreate(
            ['name' => 'ciudadano'],
            ['guard_name' => 'web', 'descripcion' => 'Usuario que propone obras']
        );

        $supervisor = Role::firstOrCreate(
            ['name' => 'supervisor'],
            ['guard_name' => 'web', 'descripcion' => 'Revisa y valida propuestas']
        );

        $gestor = Role::firstOrCreate(
            ['name' => 'gestor'],
            ['guard_name' => 'web', 'descripcion' => 'Administra obras y recursos']
        );

        $soporte = Role::firstOrCreate(
            ['name' => 'soporte'],
            ['guard_name' => 'web', 'descripcion' => 'Atiende incidencias tecnicas']
        );

        // Crear permisos
        $verUsuarios = Permission::firstOrCreate(['name' => 'ver usuarios']);
        $editarUsuarios = Permission::firstOrCreate(['name' => 'editar usuarios']);

        // Asignar permisos al rol admin
        $admin->givePermissionTo([$verUsuarios, $editarUsuarios]);

        // Asignar rol a un usuario
        $user = User::find(1);
        if ($user) {
            $user->assignRole('admin');
        }

        $this->command->info('Roles y permisos creados correctamente.');
    }




}
