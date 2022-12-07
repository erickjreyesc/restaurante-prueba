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
            'usuario' => 'veronica.borges',
            'nombre' => 'Veronica Borges',
            'email' => 'veronica.borges@idipron.gov.co',
            'contrasena' => Hash::make('password123***'),
            'dependencia_id' => 1
        ])->assignRole('Administrador'); 
    }
}
