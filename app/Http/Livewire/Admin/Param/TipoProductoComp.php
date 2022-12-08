<?php

namespace App\Http\Livewire\Admin\Param;

use App\Models\Param\TipoProducto;
use App\Traits\TableTrait;
use App\Traits\ValidateTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;

class TipoProductoComp extends Component
{
    use TableTrait;
    use ValidateTrait;

    public $nombre = null, $descripcion = null, $editshow = false, $tproducto_id;
    public $formtitle = "Tipos de productos";

    protected $listeners = [
        'render' => 'render'
    ];

    public function cancelForm()
    {
        $this->resetErrorBag();
        $this->reset(['buscar', 'nombre', 'descripcion', 'tproducto_id', 'editshow', 'formtitle']);
    }

    public function rules()
    {
        return [
            'nombre' => [
                'required', 'max:100',
                Rule::unique(TipoProducto::getTableName(), 'nombre')->ignore($this->tproducto_id, 'id')->withoutTrashed()
            ],
            'descripcion' => 'nullable|string',
        ];
    }

    public function render()
    {
        $results = TipoProducto::search($this->buscar)->paginate(15);
        return view('livewire.admin.param.tipo-producto-comp', compact('results'));
    }

    public function store()
    {
        $this->validate();
        try {
            DB::beginTransaction();

            TipoProducto::create([
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
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

    public function editar(TipoProducto $tipoProducto)
    {
        $this->tipoProducto = $tipoProducto;
        $this->tproducto_id = $tipoProducto->id;
        $this->nombre = $tipoProducto->nombre;
        $this->descripcion = $tipoProducto->descripcion;
        $this->editshow = true;
    }

    public function update()
    {
        $this->validate();
        try {
            DB::beginTransaction();

            $this->tipoProducto->fill([
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
            ])->save();

            DB::commit();

            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => __('backend.model.resource.updated', [
                    'value' => $this->tipoProducto->nombre
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
