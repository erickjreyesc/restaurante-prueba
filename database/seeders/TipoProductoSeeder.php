<?php

namespace Database\Seeders;

use App\Models\Param\TipoProducto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array([
            'nombre' => "Bebida",
            'descripcion' => "Indica si el producto es de categoría sobre bebida."
        ],[
            'nombre' => "Comida",
            'descripcion' => "Indica si el producto es de categoría sobre comidas."
        ]);

        foreach ($data as $key => $value) {
            TipoProducto::create($data[$key]);
        }
    }
}
