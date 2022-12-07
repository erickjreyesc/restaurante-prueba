<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Identificador de la tabla usuario');
            $table->string('nombre', 100)->nullable()->comment('Nombre del usuario');
            $table->string('usuario')->comment('Nombre codigo de usuario');
            $table->string('email')->unique()->comment('Correo electronico del usuario');
            $table->timestamp('email_verified_at')->nullable()->comment('Fecha de verificacion del usuario');
            $table->string('contrasena')->comment('Contraseña del usuario');
            $table->rememberToken()->comment('Código de recuerda al usuario dentro de una sesión');
            $table->foreignId('current_team_id')->nullable()->comment('Código identificador que recuerda a un usuario en una sesión');
            $table->string('profile_photo_path', 2048)->nullable()->comment('Imagen avatar del usuario');
            $table->boolean('estado')->default(true)->comment('Estado del usuario');
            $table->timestamps();
            $table->softDeletes()->comment('Fecha de borrado del Usuario.');
        });
        DB::statement("ALTER TABLE users comment 'Tabla de Usuarios'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
