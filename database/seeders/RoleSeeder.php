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
            ["name" => "inventario.listar", 'guard_name' => 'web', 'description' => 'Listar inventario', 'modulo' => 'Inventario'],
            ["name" => "inventario.agregar", 'guard_name' => 'web', 'description' => 'Agregar inventario', 'modulo' => 'Inventario'],
            ["name" => "inventario.editar", 'guard_name' => 'web', 'description' => 'Editar inventario', 'modulo' => 'Inventario'],
            ["name" => "tipo-operacion.listar", 'guard_name' => 'web', 'description' => 'Listar Actas preferencial', 'modulo' => 'Parámetros'],
            ["name" => "tipo-producto.listar", 'guard_name' => 'web', 'description' => 'Listar tipo producto', 'modulo' => 'Parámetros'],
            ["name" => "tipo-producto.agregar", 'guard_name' => 'web', 'description' => 'Agregar tipo producto', 'modulo' => 'Parámetros'],
            ["name" => "tipo-producto.editar", 'guard_name' => 'web', 'description' => 'Editar tipo producto', 'modulo' => 'Parámetros'],
            ["name" => "tipo-producto.cambiar", 'guard_name' => 'web', 'description' => 'Cambiar tipo producto', 'modulo' => 'Parámetros'],
            ["name" => "tipo-producto.eliminar", 'guard_name' => 'web', 'description' => 'Eliminar tipo producto', 'modulo' => 'Parámetros'],
            ["name" => "producto.listar", 'guard_name' => 'web', 'description' => 'Listar producto', 'modulo' => 'Inventario'],
            ["name" => "producto.agregar", 'guard_name' => 'web', 'description' => 'Agregar producto', 'modulo' => 'Inventario'],
            ["name" => "producto.editar", 'guard_name' => 'web', 'description' => 'Editar producto', 'modulo' => 'Inventario'],
            ["name" => "producto.cambiar", 'guard_name' => 'web', 'description' => 'Cambiar producto', 'modulo' => 'Inventario'],
            ["name" => "producto.eliminar", 'guard_name' => 'web', 'description' => 'Eliminar producto', 'modulo' => 'Inventario'],
            ["name" => "roles.listar", 'guard_name' => 'web', 'description' => 'Listar roles', 'modulo' => 'Seguridad'],
            ["name" => "roles.agregar", 'guard_name' => 'web', 'description' => 'Agregar roles', 'modulo' => 'Seguridad'],
            ["name" => "roles.editar", 'guard_name' => 'web', 'description' => 'Editar roles', 'modulo' => 'Seguridad'],
            ["name" => "roles.eliminar", 'guard_name' => 'web', 'description' => 'Eliminar roles', 'modulo' => 'Seguridad'],
            ["name" => "usuario.listar", 'guard_name' => 'web', 'description' => 'Listar usuario', 'modulo' => 'Seguridad'],
            ["name" => "usuario.agregar", 'guard_name' => 'web', 'description' => 'Agregar usuario', 'modulo' => 'Seguridad'],
            ["name" => "usuario.editar", 'guard_name' => 'web', 'description' => 'Editar usuario', 'modulo' => 'Seguridad'],
            ["name" => "usuario.cambiar", 'guard_name' => 'web', 'description' => 'Cambiar usuario', 'modulo' => 'Seguridad'],
            ["name" => "usuario.eliminar", 'guard_name' => 'web', 'description' => 'Eliminar usuario', 'modulo' => 'Seguridad'],
            ["name" => "usuario.reset", 'guard_name' => 'web', 'description' => 'Restablecer contraseña usuario', 'modulo' => 'Seguridad'],
            ["name" => "venta.agregar", 'guard_name' => 'web', 'description' => 'Agregar venta', 'modulo' => 'Inventario'],
            ["name" => "reporte.listar", 'guard_name' => 'web', 'description' => 'Listar reporte', 'modulo' => 'Inventario'],
            ["name" => "reporte.generar", 'guard_name' => 'web', 'description' => 'Generar reporte', 'modulo' => 'Inventario'],
            ["name" => "reporte.xls", 'guard_name' => 'web', 'description' => 'Generar reporte xls', 'modulo' => 'Inventario'],
            ["name" => "registro.listar", 'guard_name' => 'web', 'description' => 'Generar registro', 'modulo' => 'Inventario'],
            ["name" => "registro.generar", 'guard_name' => 'web', 'description' => 'Generar registro', 'modulo' => 'Inventario'],
        );

        foreach ($data as $key => $value) {
            Permission::create($data[$key])->syncRoles($role1);
        }
    }
}
