<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producto_id')->comment('Llave foranea de la tabla productos.');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('tipo_operacion_id')->comment('Llave foranea de la tabla tipo_operacion.');
            $table->foreign('tipo_operacion_id')->references('id')->on('tipo_operacion')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('ingreso')->unsigned()->default(0)->comment('Indica el ingreso de productos nuevos');
            $table->integer('egreso')->unsigned()->default(0)->comment('Indica el egreso de productos nuevos');
            $table->integer('total')->unsigned()->default(0)->comment('Indica el total de productos');
            $table->boolean('estado')->default(true)->comment('Estado del dato.');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventarios');
    }
};
