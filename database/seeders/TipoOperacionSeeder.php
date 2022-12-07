<?php

namespace Database\Seeders;

use App\Models\Param\TipoOperacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoOperacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array([
            'nombre' => "Entrada",
            'descripcion' => "Indica la entrada o ingreso de un producto."
        ],[
            'nombre' => "Salida",
            'descripcion' => "Indica la salida o egreso de un producto."
        ]);

        foreach ($data as $key => $value) {
            TipoOperacion::create($data[$key]);
        }
    }
}
