<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePersonalAccessTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Identificación de la tabla personal_access_tokens.');
            $table->morphs('tokenable');
            $table->string('name')->comment('Nombre del token.');
            $table->string('token', 64)->unique()->comment('Código del token.');
            $table->text('abilities')->nullable()->comment('Permisos otorgados del token');
            $table->timestamp('last_used_at')->nullable()->comment('Último uso del token.');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE personal_access_tokens comment 'Tabla que Almacena los token autorizados a aplicaciones'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_access_tokens');
    }
}
