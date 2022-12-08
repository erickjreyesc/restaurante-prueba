<?php

namespace App\Http\Livewire\Admin\Transacciones;

use App\Models\Admin\Producto;
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
    public $codigo, $nombre, $descripcion, $precio, $estado, $tipo_producto_id, $producto_id, $producto;

    public function render()
    {
        $tipo_productos = TipoProducto::where('estado', 1)->get();
        $results = Producto::search($this->buscar)->paginate(15);
        return view('livewire.admin.transacciones.producto-comp', compact('results', 'tipo_productos'));
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
                'required', 'max:100',
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

            Producto::create([
                'codigo' => $this->codigo,
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'precio' => $this->precio,
                'estado' => $this->estado,
                'tipo_producto_id' => $this->tipo_producto_id,
            ])->save();

            DB::commit();

            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => __('backend.model.resource.updated', [
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
                'precio' => $this->precio,
                'estado' => $this->estado,
                'tipo_producto_id' => $this->tipo_producto_id,
            ])->save();

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
}
