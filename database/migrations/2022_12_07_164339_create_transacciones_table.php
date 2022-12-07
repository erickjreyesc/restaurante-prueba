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
            $table->unsignedBigInteger('producto_id')->comment('Llave foranea de la tabla productos.');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('venta_id')->comment('Llave foranea de la tabla ventas.');
            $table->foreign('venta_id')->references('id')->on('ventas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('orden', 12)->nullable()->comment('Código de orden de compra');
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
