<?php

namespace Database\Seeders;

use App\Models\Admin\Inventario;
use DateTime;
use Illuminate\Database\Seeder;

class InventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                "producto_id" => 1,
                "tipo_operacion_id" => 1,
                "ingreso" => 0,
                "egreso" => 0,
                "total" => 55,
                "estado" => 1,
                "created_at" => new Datetime,
                "updated_at" => new Datetime
            ],
            [
                "producto_id" => 2,
                "tipo_operacion_id" => 1,
                "ingreso" => 0,
                "egreso" => 0,
                "total" => 65,
                "estado" => 1,
                "created_at" => new DateTime(),
                "updated_at" => new Datetime
            ],
            [
                "producto_id" => 3,
                "tipo_operacion_id" => 1,
                "ingreso" => 0,
                "egreso" => 0,
                "total" => 83,
                "estado" => 1,
                "created_at" => new Datetime,
                "updated_at" => new Datetime
            ],
            [
                "producto_id" => 4,
                "tipo_operacion_id" => 1,
                "ingreso" => 0,
                "egreso" => 0,
                "total" => 91,
                "estado" => 1,
                "created_at" => new Datetime,
                "updated_at" => new Datetime
            ],
            [
                "producto_id" => 5,
                "tipo_operacion_id" => 1,
                "ingreso" => 0,
                "egreso" => 0,
                "total" => 48,
                "estado" => 1,
                "created_at" => new Datetime,
                "updated_at" => new Datetime
            ],
            [
                "producto_id" => 6,
                "tipo_operacion_id" => 1,
                "ingreso" => 0,
                "egreso" => 0,
                "total" => 18,
                "estado" => 1,
                "created_at" => new Datetime,
                "updated_at" => new Datetime
            ],
            [
                "producto_id" => 7,
                "tipo_operacion_id" => 1,
                "ingreso" => 0,
                "egreso" => 0,
                "total" => 99,
                "estado" => 1,
                "created_at" => new Datetime,
                "updated_at" => new Datetime
            ],
            [
                "producto_id" => 8,
                "tipo_operacion_id" => 1,
                "ingreso" => 0,
                "egreso" => 0,
                "total" => 150,
                "estado" => 1,
                "created_at" => new Datetime,
                "updated_at" => new Datetime
            ],
            [
                "producto_id" => 9,
                "tipo_operacion_id" => 1,
                "ingreso" => 0,
                "egreso" => 0,
                "total" => 94,
                "estado" => 1,
                "created_at" => new Datetime,
                "updated_at" => new Datetime
            ],
            [
                "producto_id" => 10,
                "tipo_operacion_id" => 1,
                "ingreso" => 0,
                "egreso" => 0,
                "total" => 125,
                "estado" => 1,
                "created_at" => new Datetime,
                "updated_at" => new Datetime
            ],
            [
                "producto_id" => 11,
                "tipo_operacion_id" => 1,
                "ingreso" => 0,
                "egreso" => 0,
                "total" => 250,
                "estado" => 1,
                "created_at" => new Datetime,
                "updated_at" => new Datetime
            ],
            [
                "producto_id" => 12,
                "tipo_operacion_id" => 1,
                "ingreso" => 0,
                "egreso" => 0,
                "total" => 15,
                "estado" => 1,
                "created_at" => new Datetime,
                "updated_at" => new Datetime
            ],
            [
                "producto_id" => 13,
                "tipo_operacion_id" => 1,
                "ingreso" => 0,
                "egreso" => 0,
                "total" => 24,
                "estado" => 1,
                "created_at" => new Datetime,
                "updated_at" => new Datetime
            ],
            [
                "producto_id" => 14,
                "tipo_operacion_id" => 1,
                "ingreso" => 0,
                "egreso" => 0,
                "total" => 38,
                "estado" => 1,
                "created_at" => new Datetime,
                "updated_at" => new Datetime
            ],
            [
                "producto_id" => 15,
                "tipo_operacion_id" => 1,
                "ingreso" => 0,
                "egreso" => 0,
                "total" => 28,
                "estado" => 1,
                "created_at" => new Datetime,
                "updated_at" => new Datetime
            ],
            [
                "producto_id" => 16,
                "tipo_operacion_id" => 1,
                "ingreso" => 0,
                "egreso" => 0,
                "total" => 72,
                "estado" => 1,
                "created_at" => new Datetime,
                "updated_at" => new Datetime
            ],
            [
                "producto_id" => 17,
                "tipo_operacion_id" => 1,
                "ingreso" => 0,
                "egreso" => 0,
                "total" => 15,
                "estado" => 1,
                "created_at" => new Datetime,
                "updated_at" => new Datetime
            ]
        );

        foreach ($data as $key => $value) {
            Inventario::create($data[$key]);
        }

    }
}
