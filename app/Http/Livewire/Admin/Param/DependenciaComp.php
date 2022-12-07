<?php

namespace App\Http\Livewire\Admin\Param;

use App\Models\Param\Dependencias;
use App\Traits\TableTrait;
use App\Traits\ValidateTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;

class DependenciaComp extends Component
{
    use TableTrait;
    use ValidateTrait;

    public $formtitle = 'Dependencias';
    public $editshow = false, $codigo = null, $nombre = null, $sigla = null, $estado = 0, $dependencia_id = null;

    protected $listeners = [
        'render' => 'render'
    ];

    public function cancelForm()
    {
        $this->resetErrorBag();
        $this->reset(['buscar', 'codigo', 'nombre', 'sigla', 'estado', 'formtitle', 'dependencia_id', 'editshow']);
    }

    public function rules()
    {
        return [
            'nombre' => [
                'required', 'max:100',
                Rule::unique(Dependencias::getTableName(), 'nombre')->ignore($this->dependencia_id, 'id')->withoutTrashed()
            ],
            'codigo' => [
                'required', 'max:10',
                Rule::unique(Dependencias::getTableName(), 'codigo')->ignore($this->dependencia_id, 'id')->withoutTrashed()
            ],
            'sigla' => [
                'required', 'alpha_num', 'min:2', 'max:10',
                Rule::unique(Dependencias::getTableName(), 'sigla')->ignore($this->dependencia_id, 'id')->withoutTrashed()
            ],
            'estado' => 'boolean|nullable',
        ];
    }

    public function render()
    {
        $results = Dependencias::search($this->buscar)->paginate(15);
        return view('livewire.admin.param.dependencia-comp', compact('results'));
    }

    public function store()
    {
        $this->validate();
        try {
            DB::beginTransaction();

            Dependencias::create([
                'codigo' => $this->codigo,
                'nombre' => $this->nombre,
                'sigla' => $this->sigla,
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

    public function editar(Dependencias $dependencia)
    {
        $this->dependencia = $dependencia;
        $this->dependencia_id = $dependencia->id;
        $this->nombre = $dependencia->nombre;
        $this->codigo = $dependencia->codigo;
        $this->sigla = $dependencia->sigla;
        $this->estado = $dependencia->estado;
        $this->editshow = true;
    }

    public function update()
    {
        $this->validate();
        try {
            DB::beginTransaction();

            $this->dependencia->fill([
                'codigo' => $this->codigo,
                'nombre' => $this->nombre,
                'sigla' => $this->sigla,
                'estado' => $this->estado
            ])->save();

            DB::commit();

            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => __('backend.model.resource.updated', [
                    'value' => $this->dependencia->nombre
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
