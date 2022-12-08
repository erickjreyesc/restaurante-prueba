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
        Schema::create('transacciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inventario_id')->comment('Llave foranea de la tabla inventario.');
            $table->foreign('inventario_id')->references('id')->on('inventario')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('cliente_id')->comment('Llave foranea de la tabla clientes.');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('precio')->unsigned()->default(12);
            $table->integer('cantidad')->unsigned()->default(12);
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
        Schema::dropIfExists('transacciones');
    }
};
