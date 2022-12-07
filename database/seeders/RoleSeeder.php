<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(["name" => "Administrador", 'description' => 'Rol de administración del sistema']);

        $data = array(
            ["name" => "actas.listar", 'guard_name' => 'web', 'description' => 'Listar Actas preferencial',  'modulo' => 'Actas'],
            ["name" => "actas.agregar", 'guard_name' => 'web', 'description' => 'Agregar Actas preferencial',  'modulo' => 'Actas'],
            ["name" => "actas.editar", 'guard_name' => 'web', 'description' => 'Editar Actas preferencial',  'modulo' => 'Actas'],
            ["name" => "actas.eliminar", 'guard_name' => 'web', 'description' => 'Eliminar Actas preferencial',  'modulo' => 'Actas'],
            ["name" => "tipo-reunion.listar", 'guard_name' => 'web', 'description' => 'Listar Actas preferencial',  'modulo' => 'Parámetros'],
            ["name" => "tipo-reunion.agregar", 'guard_name' => 'web', 'description' => 'Agregar Actas preferencial',  'modulo' => 'Parámetros'],
            ["name" => "tipo-reunion.editar", 'guard_name' => 'web', 'description' => 'Editar Actas preferencial',  'modulo' => 'Parámetros'],
            ["name" => "tipo-reunion.cambiar", 'guard_name' => 'web', 'description' => 'Cambiar Actas preferencial',  'modulo' => 'Parámetros'],
            ["name" => "tipo-reunion.eliminar", 'guard_name' => 'web', 'description' => 'Eliminar Actas preferencial',  'modulo' => 'Parámetros'],
            ["name" => "dependencia.listar", 'guard_name' => 'web', 'description' => 'Listar Dependencias',  'modulo' => 'Parámetros'],
            ["name" => "dependencia.agregar", 'guard_name' => 'web', 'description' => 'Agregar Dependencias',  'modulo' => 'Parámetros'],
            ["name" => "dependencia.editar", 'guard_name' => 'web', 'description' => 'Editar Dependencias',  'modulo' => 'Parámetros'],
            ["name" => "dependencia.cambiar", 'guard_name' => 'web', 'description' => 'Cambiar Dependencias',  'modulo' => 'Parámetros'],
            ["name" => "dependencia.eliminar", 'guard_name' => 'web', 'description' => 'Eliminar Dependencias',  'modulo' => 'Parámetros'],
        );

        foreach ($data as $key => $value) {
            Permission::create($data[$key])->syncRoles($role1);
        }
    }
}
