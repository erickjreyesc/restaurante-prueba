<?php

namespace Database\Seeders;

use App\Models\Param\Dependencias;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DependenciasSeeder extends Seeder
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
                "codigo" => 1,
                "nombre" => "DIRECCION",
                "sigla" => "DIR",
                "estado" => 1
            ],
            [
                "codigo" => 101,
                "nombre" => "PLANEACION",
                "sigla" => "PYS",
                "estado" => 1
            ],
            [
                "codigo" => 102,
                "nombre" => "JURIDICA",
                "sigla" => "JUR",
                "estado" => 1
            ],
            [
                "codigo" => 103,
                "nombre" => "CONTROL INTERNO",
                "sigla" => "CI",
                "estado" => 1
            ],
            [
                "codigo" => 1000,
                "nombre" => "DIRECCIÓN GENERAL",
                "sigla" => "DG",
                "estado" => 1
            ],
            [
                "codigo" => 1100,
                "nombre" => "OFICINA DE CONTROL DISCIPLINARIO INTERNO",
                "sigla" => "CDI",
                "estado" => 1
            ],
            [
                "codigo" => 1200,
                "nombre" => "OFICINA DE CONTROL INTERNO",
                "sigla" => "CI",
                "estado" => 1
            ],
            [
                "codigo" => 1300,
                "nombre" => "OFICINA ASESORA DE PLANEACIÓN",
                "sigla" => "OAP",
                "estado" => 1
            ],
            [
                "codigo" => 1400,
                "nombre" => "OFICINA JURÍDICA",
                "sigla" => "OJ",
                "estado" => 1
            ],
            [
                "codigo" => 1500,
                "nombre" => "OFICINA ASESORA DE COMUNICACIONES",
                "sigla" => "OAC",
                "estado" => 1
            ],
            [
                "codigo" => 1600,
                "nombre" => "OFICINA DE TECNOLOGÍAS DE LA INFORMACIÓN Y LAS COMUNICACIONES",
                "sigla" => "TIC",
                "estado" => 1
            ],
            [
                "codigo" => 2000,
                "nombre" => "SECRETARIA GENERAL",
                "sigla" => "SG",
                "estado" => 1
            ],
            [
                "codigo" => 2100,
                "nombre" => "SERVICIO AL CIUDADANO",
                "sigla" => "SC",
                "estado" => 1
            ],
            [
                "codigo" => 2200,
                "nombre" => "GERENCIA DE TALENTO HUMANO",
                "sigla" => "GTH",
                "estado" => 1
            ],
            [
                "codigo" => 2300,
                "nombre" => "GERENCIA CONTRATACIÓN",
                "sigla" => "GC",
                "estado" => 1
            ],
            [
                "codigo" => 2400,
                "nombre" => "GERENCIA FINANCIERA",
                "sigla" => "GF",
                "estado" => 1
            ],
            [
                "codigo" => 2500,
                "nombre" => "GERENCIA ADMINISTRATIVA",
                "sigla" => "GAD",
                "estado" => 1
            ],
            [
                "codigo" => 2600,
                "nombre" => "GERENCIA RECURSOS FÍSICOS",
                "sigla" => "GRF",
                "estado" => 1
            ],
            [
                "codigo" => 3000,
                "nombre" => "SUBDIRECCIÓN POBLACIONAL",
                "sigla" => "STP",
                "estado" => 1
            ],
            [
                "codigo" => 3100,
                "nombre" => "GERENCIA TERRITORIO",
                "sigla" => "GT",
                "estado" => 1
            ],
            [
                "codigo" => 3200,
                "nombre" => "GERENCIA OPERATIVA",
                "sigla" => "GOP",
                "estado" => 1
            ],
            [
                "codigo" => 4000,
                "nombre" => "SUBDIRECCION DE LINEAMIENTOS Y POLÍTICAS",
                "sigla" => "SLP",
                "estado" => 1
            ],
            [
                "codigo" => 4100,
                "nombre" => "GERENCIA DE CAPACIDADES Y DERECHOS",
                "sigla" => "GCD",
                "estado" => 1
            ],
            [
                "codigo" => 5000,
                "nombre" => "SUBDIRECCION PARA LAS OPORTUNIDADES",
                "sigla" => "SOP",
                "estado" => 1
            ],
            [
                "codigo" => 5100,
                "nombre" => "GERENCIA INSERCIÓN SOCIOECONÓMICA",
                "sigla" => "GIS",
                "estado" => 1
            ],
            [
                "codigo" => 5200,
                "nombre" => "GERENCIA ENTRATEGIAS DE CORRESPONSABILIDAD",
                "sigla" => "GEC",
                "estado" => 1
            ],
            [
                "codigo" => 10601005,
                "nombre" => "GRUPO COMPRAS ALMACEN E INVENTARIOS",
                "sigla" => "COM",
                "estado" => 1
            ],
            [
                "codigo" => 10601007,
                "nombre" => "ALMACEN",
                "sigla" => "ALM",
                "estado" => 1
            ],
            [
                "codigo" => 106010070,
                "nombre" => "BODEGA ALMACEN",
                "sigla" => "SUB",
                "estado" => 1
            ]
        );

        foreach ($data as $key => $value) {
            Dependencias::create($data[$key]);
        }
    }
}
