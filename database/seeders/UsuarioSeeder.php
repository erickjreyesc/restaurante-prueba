<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'usuario' => 'usuario',
            'nombre' => 'usuario',
            'email' => 'usuario@restaurante.com.co',
            'contrasena' => Hash::make('password123***'),
        ])->assignRole('Administrador'); 
    }
}
