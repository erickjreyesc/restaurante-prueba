<?php

namespace App\Http\Livewire\Admin\Transacciones;

use App\Models\Admin\Cliente;
use App\Models\Admin\Inventario;
use App\Models\Admin\Producto;
use App\Models\Param\TipoProducto;
use App\Traits\UtilityTrait;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OrdenesComp extends Component
{
    use UtilityTrait;
    public $formtitle = "Nueva venta";
    public $cantidad = 0, $productos, $resumen, $transaccion, $nombre = null, $dni = null, $direccion = null, $tipo_producto_id = null, $producto_id = null, $inventario_id = null;
    public $precio_selected = 0, $cantmax = 0, $nombre_selected, $totalidad = 0, $count = 0, $total = 0;

    public function rules()
    {
        return [
            'nombre' => [
                'required', 'max:100',
            ],
            'dni' => [
                'required', 'max:15', 'alpha_num',
            ],
            'direccion' => 'nullable|string|min:2',
        ];
    }

    public function render()
    {
        $tipo_productos = TipoProducto::where('estado', 1)->get();

        $producto = [];

        if (isset($this->tipo_producto_id)) {
            $value = $this->tipo_producto_id;
            $producto = Inventario::whereHas('producto', function ($query) use ($value) {
                $query->where('tipo_producto_id', $value)->where('estado', 1)->where('total', '>', 0);
            })->where('estado', 1)->get();
        }

        if (isset($this->producto_id)) {
            $get_selected = Producto::find($this->producto_id);
            $this->inventario_id = $get_selected->lastProducto()->id;
            $this->nombre_selected = $get_selected->nombre;
            $this->precio_selected = $get_selected->precio;
            $this->cantmax = $get_selected->lastProducto()->total;
        }

        return view('livewire.admin.transacciones.ordenes-comp', compact('producto', 'tipo_productos'));
    }

    public function clearInput()
    {
        $this->reset('nombre_selected', 'precio_selected', 'cantidad', 'cantmax', 'tipo_producto_id', 'producto_id');
    }

    public function AgregarProducto()
    {
        $this->validate([
            'tipo_producto_id' => 'required|exists:tipo_producto,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1|max:' . $this->cantmax,
        ]);

        $this->resumen[$this->count] = [
            "nombre" => $this->nombre_selected,
            "precio" => $this->precio_selected,
            "cantidad" => $this->cantidad,
            "total" => $this->precio_selected * $this->cantidad
        ];

        $total[$this->count] = [
            "total" => $this->precio_selected * $this->cantidad
        ];

        $this->transaccion[$this->count] = [
            "inventario_id" => $this->inventario_id,
            "precio" => $this->precio_selected,
            "cantidad" => $this->cantidad
        ];

        $this->productos[$this->count] = [
            "producto_id" => $this->producto_id,
            "cantidad" => $this->cantidad,
            "total" => $this->cantmax,
        ];

        foreach ($total as $value) {
            $this->total = $this->total + $value['total'];
        }

        $this->count++;
        $this->clearInput();
    }

    public function store()
    {
        $this->validate();

        if (is_null($this->productos)) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => __('backend.errors.base', [
                    'code' => 419,
                    'message' => "Debe cargar al menos un producto."
                ])
            ]);
        } else {
            try {
                DB::beginTransaction();

                $cliente = [];

                $clientefind = Cliente::where('nombre', $this->nombre)->where('dni', $this->dni)->first();

                if (is_null($clientefind)) {
                    $cliente = Cliente::create([
                        'nombre' => $this->nombre,
                        'dni' => $this->dni,
                        'direccion' => $this->direccion,
                    ]);
                } else {
                    $cliente = $clientefind;
                }

                foreach ($this->transaccion as $value) {
                    $cliente->transaccion()->create([
                        "inventario_id" => $value['inventario_id'],
                        "precio" => $value['precio'],
                        "cantidad" => $value['cantidad']
                    ]);
                }

                foreach ($this->productos as $value) {
                    Inventario::create([
                        "producto_id" => $value['producto_id'],
                        "tipo_operacion_id" => 2,
                        "egreso" => $value['cantidad'],
                        "total" => $value['total'] - $value['cantidad'],
                        "estado" => 1
                    ]);
                }

                DB::commit();

                $this->dispatchBrowserEvent('alert', [
                    'type' => 'success',
                    'message' => __('backend.model.resource.create')
                ]);

                $this->clearInput();

                $this->reset('nombre', 'dni', 'direccion', 'productos', 'transaccion', 'resumen', 'count', 'total');

                $this->emit('render');
            } catch (\Throwable $th) {
                DB::rollBack();
                $this->dispatchBrowserEvent('alert', [
                    'type' => 'error',
                    'message' => __('backend.errors.base', [
                        'code' => $th->getCode(),
                        'message' => $th->getMessage()
                    ])
                ]);
            }
        }
    }
}
