<?php

namespace App\Http\Livewire\Admin\Param;

use App\Models\Actas\TipoReunion;
use App\Traits\TableTrait;
use App\Traits\ValidateTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;

class TipoReunionComponent extends Component
{
    use TableTrait;
    use ValidateTrait;

    public $formtitle = 'Tipo de Reunión';
    public $editshow = false, $acronimo = null, $nombre = null, $descripcion = null, $estado = 0, $tipoReunion = null, $tipoReunion_id = null;

    protected $listeners = [
        'render' => 'render'
    ];

    public function cancelForm()
    {
        $this->resetErrorBag();
        $this->reset(['buscar', 'acronimo', 'nombre', 'descripcion', 'estado', 'formtitle', 'tipoReunion', 'editshow']);
    }

    public function rules()
    {
        return [
            'nombre' => [
                'required', 'max:100',
                Rule::unique(TipoReunion::getTableName(), 'nombre')->ignore($this->tipoReunion_id, 'id')->withoutTrashed()
            ],
            'acronimo' => [
                'required', 'alpha_num', 'min:2', 'max:10',
                Rule::unique(TipoReunion::getTableName(), 'acronimo')->ignore($this->tipoReunion_id, 'id')->withoutTrashed()
            ],
            'descripcion' => 'nullable|string',
            'estado' => 'boolean|nullable',
        ];
    }

    public function render()
    {
        $results = TipoReunion::search($this->buscar)->paginate(15);
        return view('livewire.admin.param.tipo-reunion-component', compact('results'));
    }

    public function store()
    {
        $this->validate();
        try {
            DB::beginTransaction();

            TipoReunion::create([
                'acronimo' => $this->acronimo,
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'estado' => $this->estado
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

    public function editar(TipoReunion $tipoReunion)
    {
        $this->tipoReunion = $tipoReunion;
        $this->tipoReunion_id = $tipoReunion->id;
        $this->nombre = $tipoReunion->nombre;
        $this->acronimo = $tipoReunion->acronimo;
        $this->descripcion = $tipoReunion->descripcion;
        $this->estado = $tipoReunion->estado;
        $this->editshow = true;
    }

    public function update()
    {
        $this->validate();
        try {
            DB::beginTransaction();

            $this->tipoReunion->fill([
                'acronimo' => $this->acronimo,
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'estado' => $this->estado
            ])->save();

            DB::commit();

            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => __('backend.model.resource.updated', [
                    'value' => $this->tipoReunion->nombre
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
