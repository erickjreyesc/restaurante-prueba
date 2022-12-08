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
            'descripcion' => "Indica si el producto es de categoría sobre bebida.",
            'estado' => 1
        ],[
            'nombre' => "Comida",
            'descripcion' => "Indica si el producto es de categoría sobre comidas.",
            'estado' => 1
        ],[
            'nombre' => "Entremés",
            'descripcion' => "Indica si el producto es de categoría sobre entremeses.",
            'estado' => 1
        ]);

        foreach ($data as $key => $value) {
            TipoProducto::create($data[$key]);
        }
    }
}
