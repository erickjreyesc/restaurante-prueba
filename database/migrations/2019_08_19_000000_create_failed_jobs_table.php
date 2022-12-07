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
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id()->comment('Identificador de la tabla failed_jobs');
            $table->string('uuid')->unique()->comment('Código identificador uuid.');
            $table->text('connection')->comment('Informacion de la conexion de trabajo fallido.');
            $table->text('queue')->comment('Idenficacion y generacion de la cola fallida');
            $table->longText('payload')->comment('Arreglo o contenido de la cola fallida');
            $table->longText('exception')->comment('Identificación de la excepcion generada');
            $table->timestamp('failed_at')->useCurrent()->comment('Fecha registrada del evento fallido');
        });
        DB::statement("ALTER TABLE failed_jobs comment 'Tabla Transitoria de resguardo de trabajos fallidos'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('failed_jobs');
    }
};
