<?php

namespace App\Http\Livewire\Admin\Transacciones;

use App\Models\Admin\Producto;
use App\Models\Param\TipoOperacion;
use App\Models\Param\TipoProducto;
use App\Traits\TableTrait;
use App\Traits\UtilityTrait;
use App\Traits\ValidateTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ProductoComp extends Component
{
    use UtilityTrait;
    use ValidateTrait;
    use TableTrait;

    protected $listeners = [
        'render' => 'render'
    ];

    public $formtitle = "Productos";
    public $editshow = false;
    public $codigo, $nombre, $descripcion, $precio, $estado, $tipo_producto_id, $producto_id, $producto, $cantidad, $tipo_operacion_id;

    public function render()
    {
        $tipo_operacion = TipoOperacion::all();
        $tipo_productos = TipoProducto::where('estado', 1)->get();
        $results = Producto::search($this->buscar)->paginate(15);
        return view('livewire.admin.transacciones.producto-comp', compact('results', 'tipo_productos', 'tipo_operacion'));
    }

    public function cancelForm()
    {
        $this->resetErrorBag();
        $this->reset(['buscar', 'codigo', 'nombre', 'descripcion', 'precio', 'estado', 'tipo_producto_id', 'editshow', 'formtitle', 'producto', 'producto_id']);
    }

    public function rules()
    {
        return [
            'nombre' => [
                'required', 'max:100',
                Rule::unique(Producto::getTableName(), 'nombre')->ignore($this->producto_id, 'id')->withoutTrashed()
            ],
            'codigo' => [
                'required', 'max:100', 'alpha_num',
                Rule::unique(Producto::getTableName(), 'codigo')->ignore($this->producto_id, 'id')->withoutTrashed()
            ],
            'precio' => [
                'required', 'numeric', 'between:0,999999999.99'
            ],
            'tipo_producto_id' => [
                'required', 'exists:' . TipoProducto::getTableName() . ',id',
            ],
            'descripcion' => 'nullable|string',
            'estado' => 'boolean|nullable',
        ];
    }

    public function store()
    {
        $this->validate();
        try {
            DB::beginTransaction();

            $producto = Producto::create([
                'codigo' => $this->codigo,
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'precio' => $this->numericFloatConverter($this->precio),
                'estado' => $this->estado,
                'tipo_producto_id' => $this->tipo_producto_id,
            ]);

            $producto->inventario()->create([
                'tipo_operacion_id' => 1,
                'ingreso' => $this->cantidad,
                'total' => $this->cantidad
            ]);

            DB::commit();

            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => __('backend.model.resource.created', [
                    'value' => $this->nombre
                ])
            ]);

            $this->emit('render');

            $this->cancelForm();
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

    public function editar(Producto $producto)
    {
        $this->producto = $producto;
        $this->producto_id = $producto->id;
        $this->codigo = $producto->codigo;
        $this->nombre = $producto->nombre;
        $this->precio = $producto->precio;
        $this->tipo_producto_id = $producto->tipo_producto_id;
        $this->descripcion = $producto->descripcion;
        $this->cantidad = (!is_null($producto->lastProducto())) ? $producto->lastProducto()->total : 0;
        $this->estado = $producto->estado;
        $this->editshow = true;
    }

    public function update()
    {
        $this->validate();
        try {
            DB::beginTransaction();

            $this->producto->fill([
                'codigo' => $this->codigo,
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'precio' => $this->numericFloatConverter($this->precio),
                'estado' => $this->estado,
                'tipo_producto_id' => $this->tipo_producto_id,
            ])->save();

            $this->producto->inventario()->create([
                'tipo_operacion_id' => $this->tipo_operacion_id,
                'egreso' => ($this->tipo_operacion_id == 2) ? $this->cantidad : 0,
                'ingreso' => ($this->tipo_operacion_id == 1) ? $this->cantidad : 0,
                'total' => $this->transaccion($this->cantidad, $this->tipo_operacion_id),
            ]);

            DB::commit();

            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => __('backend.model.resource.updated', [
                    'value' => $this->producto->nombre
                ])
            ]);

            $this->emit('render');

            $this->cancelForm();
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

    public function transaccion($cant, $transaccion)
    {
        $last_total = $this->producto->lastProducto()->total;
        $total = 0;
        switch ($transaccion) {
            case 2:
                $total = $last_total - $cant;
                break;
            case 3:
                $total = $cant;
                break;
            default:
                $total = $last_total + $cant;
                break;
        }
        return $total;
    }
}
