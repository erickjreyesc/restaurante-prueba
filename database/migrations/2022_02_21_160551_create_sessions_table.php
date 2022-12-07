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
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary()->comment('Identificador de la tabla sessions');
            $table->foreignId('user_id')->nullable()->index()->comment('Llave foranea de la tabla usuario. Usuario que se la ha generado la sesión');
            $table->string('ip_address', 45)->nullable()->comment('Direccion IP del usuario');
            $table->text('user_agent')->nullable()->comment('Navegador web donde se realizó el inicio de sesión');
            $table->text('payload')->comment('Información de la sesión');
            $table->integer('last_activity')->index()->comment('Ultima Actividad del Usuario.');
        });
        DB::statement("ALTER TABLE sessions comment 'Tabla que almacena las sesiones de los usuarios autorizados a aplicaciones'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
};
