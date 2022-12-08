<?php

namespace Database\Seeders;

use App\Models\Admin\Producto;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
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
                "id" => 1,
                "codigo" => "CRISPY",
                "nombre" => "CRISPY WRAP",
                "descripcion" => "Bañado en los exóticos sabores del curry y coco tailandés, este bollito crujiente, relleno de pollo y camarones, se sirve en un consomé de bonito, acompañado de col lombarda.",
                "precio" => 15000.0,
                "estado" => 1,
                "tipo_producto_id" => 2,
                "created_at" => new DateTime(),
                "updated_at" => new DateTime()
            ],
            [
                "id" => 2,
                "codigo" => "SPCAL",
                "nombre" => "SOPA DE FLOR DE CALABAZA",
                "descripcion" => "Servido con una ronda de queso de cabra y chile ancho, esta sabrosa sopa de flor de calabaza se sirve con maíz y calabacín.",
                "precio" => 25000.0,
                "estado" => 1,
                "tipo_producto_id" => 2,
                "created_at" => new DateTime(),
                "updated_at" => new DateTime()
            ],
            [
                "id" => 3,
                "codigo" => "CUBATUN",
                "nombre" => "CUBOS DE ATÚN",
                "descripcion" => "Montados sobre una cama de ensalada de algas marinas, estos cubos de atún cubiertos con ajonjolí negro se sirven con salsa ponzu y rábano fresco.",
                "precio" => 60000.0,
                "estado" => 1,
                "tipo_producto_id" => 3,
                "created_at" => new DateTime(),
                "updated_at" => new DateTime()
            ],
            [
                "id" => 4,
                "codigo" => "AGUACHILE",
                "nombre" => "AGUACHILE ROJO",
                "descripcion" => "Acompañado de cebolla roja y pepino, este camarón cocido con limón se sirve bañado en una salsa de chile guajillo.",
                "precio" => 35500.0,
                "estado" => 1,
                "tipo_producto_id" => 3,
                "created_at" => new DateTime(),
                "updated_at" => new DateTime()
            ],
            [
                "id" => 5,
                "codigo" => "CALPIEDRA",
                "nombre" => "CALDO DE PIEDRA",
                "descripcion" => "El camarón en esta “sopa de piedra” se cocina justo delante de ti con una piedra al rojo vivo que se sumerge en el cálido caldo de pargo rojo con chile serrano, papas, zanahoria y tomate.",
                "precio" => 75000.0,
                "estado" => 1,
                "tipo_producto_id" => 2,
                "created_at" => new DateTime(),
                "updated_at" => new DateTime()
            ],
            [
                "id" => 6,
                "codigo" => "WONTON",
                "nombre" => "TOSTADA WONTON",
                "descripcion" => "Servido en una galleta wonton con tu elección de atún picante, hamachi o tártara vegetal, este favorito viene con cebolla roja, rodajas de aguacate y una salsa picante especial.",
                "precio" => 90000.0,
                "estado" => 1,
                "tipo_producto_id" => 3,
                "created_at" => new DateTime(),
                "updated_at" => new DateTime()
            ],
            [
                "id" => 7,
                "codigo" => "HUARACHE",
                "nombre" => "HUARACHE KOBE",
                "descripcion" => "Tiernas rebanadas de carne kobe servidas sobre una tortilla de maíz casera con queso, frijoles refritos y un mousse de aguacate.",
                "precio" => 105000.0,
                "estado" => 1,
                "tipo_producto_id" => 2,
                "created_at" => new DateTime(),
                "updated_at" => new DateTime()
            ],
            [
                "id" => 8,
                "codigo" => "POPSPOLLO ",
                "nombre" => "POPS DE POLLO ",
                "descripcion" => "Perfecto para compartir mientras te relajas en la piscina del Rooftop, ests “palomitas” de pollo se sirven con mayonesa al chipotle.",
                "precio" => 45000.0,
                "estado" => 1,
                "tipo_producto_id" => 3,
                "created_at" => new DateTime(),
                "updated_at" => new DateTime()
            ],
            [
                "id" => 9,
                "codigo" => "RACKCORDERO",
                "nombre" => "RACK DE CORDERO",
                "descripcion" => "La salsa de guajillo de piña encabeza esta combinación que lleva berenjenas a la parrilla, cebolla roja, espárragos y por supuesto, las deliciosas y decadentes costillitas ahumadas de cordero.",
                "precio" => 95000.0,
                "estado" => 1,
                "tipo_producto_id" => 2,
                "created_at" => new DateTime(),
                "updated_at" => new DateTime()
            ],
            [
                "id" => 10,
                "codigo" => "WRAPJÍCAMA",
                "nombre" => "WRAP DE JÍCAMA",
                "descripcion" => "Servidas con aderezo de chipotle, estas envolturas ingeniosamente hechas de jícama en finas rodajas contienen una mezcla de rúcula y camarones.",
                "precio" => 99000.0,
                "estado" => 1,
                "tipo_producto_id" => 2,
                "created_at" => new DateTime(),
                "updated_at" => new DateTime()
            ],
            [
                "id" => 11,
                "codigo" => "AGUA355ML",
                "nombre" => "AGUA 355ML",
                "descripcion" => "Botella de Agua de 355ml",
                "precio" => 5000.0,
                "estado" => 1,
                "tipo_producto_id" => 1,
                "created_at" => new DateTime(),
                "updated_at" => new DateTime()
            ],
            [
                "id" => 12,
                "codigo" => "LIMONADA",
                "nombre" => "Limonada",
                "descripcion" => "Agua, limón, un toque de jengibre, endulzada con miel, almíbar o estevia; la limonada bien fría acompaña cualquier plato. ",
                "precio" => 15000.0,
                "estado" => 1,
                "tipo_producto_id" => 1,
                "created_at" => new DateTime(),
                "updated_at" => new DateTime()
            ],
            [
                "id" => 13,
                "codigo" => "TEHELADO",
                "nombre" => "Té helado",
                "descripcion" => "el té helado es una opción muy acertada para atender los amantes de las infusiones. Con unas gotas de limón y hojas de menta, adquiere un sabor muy fresco que permanece en la boca",
                "precio" => 25000.0,
                "estado" => 1,
                "tipo_producto_id" => 1,
                "created_at" => new DateTime(),
                "updated_at" => new DateTime()
            ],
            [
                "id" => 14,
                "codigo" => "FRAPPE",
                "nombre" => "Café frappé",
                "descripcion" => "El café frappé se prepara en base a café expreso, al que se le agrega leche fría o agua helada.",
                "precio" => 15000.0,
                "estado" => 1,
                "tipo_producto_id" => 1,
                "created_at" => new DateTime(),
                "updated_at" => new DateTime()
            ],
            [
                "id" => 15,
                "codigo" => "GRANIZADOS ",
                "nombre" => "Granizados ",
                "descripcion" => "medio vaso (del que se usará para servir la bebida) de la fruta en trozos, medio vaso de hielo, unas gotitas de limón",
                "precio" => 18000.0,
                "estado" => 1,
                "tipo_producto_id" => 1,
                "created_at" => new DateTime(),
                "updated_at" => new DateTime()
            ],
            [
                "id" => 16,
                "codigo" => "VINOS ",
                "nombre" => "Vinos ",
                "descripcion" => "bebidas con alcohol, las mezclas de vinos y gaseosas con hielo y limón son también muy refrescantes",
                "precio" => 35000.0,
                "estado" => 1,
                "tipo_producto_id" => 1,
                "created_at" => new DateTime(),
                "updated_at" => new DateTime()
            ],
            [
                "id" => 17,
                "codigo" => "PINACOLADA",
                "nombre" => "Piña colada",
                "descripcion" => "piña, crema de coco y ron",
                "precio" => 38000.0,
                "estado" => 1,
                "tipo_producto_id" => 1,
                "created_at" => new DateTime(),
                "updated_at" => new DateTime()
            ]
        );
        foreach ($data as $key => $value) {
            Producto::create($data[$key]);
        }
    }
}
