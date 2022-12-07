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
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index()->comment('Correo del usuario a restablecer.');
            $table->string('token')->comment('Código de restablecimiento.');
            $table->timestamp('created_at')->nullable()->comment('Fecha de creación del token.');
        });
        DB::statement("ALTER TABLE password_resets comment 'Tabla Transitoria de Restablecimiento de Contraseña'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
};
