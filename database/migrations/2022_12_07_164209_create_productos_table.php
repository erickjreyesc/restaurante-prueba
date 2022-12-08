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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 15)->comment('Codigo del producto');
            $table->string('nombre', 100)->comment('Nombre del producto');
            $table->mediumText('descripcion')->nullable()->comment('Descripcion del producto');
            $table->float('precio')->default(0.00)->comment('precio del producto');
            $table->boolean('estado')->nullable()->default(false)->comment('Estado del objeto');
            $table->unsignedBigInteger('tipo_producto_id')->comment('Llave foranea de la tabla tipo_productos.');
            $table->foreign('tipo_producto_id')->references('id')->on('tipo_producto')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
