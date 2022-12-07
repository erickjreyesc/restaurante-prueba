<?php

namespace App\Http\Livewire\Admin\Misc;

use App\Traits\FormTrait;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class CambiarComponent extends Component
{
    use FormTrait;

    public $model;
    public $nombre;
    public $mode;
    public $number;

    public function mount(Model $model, $nombre, $mode = 'btn')
    {
        $this->model = $model;
        $this->nombre = $nombre;
        $this->number = $model->id;
        $this->mode = $mode;
    }

    public function render()
    {
        return view('livewire.admin.misc.cambiar-component');
    }

    public function change()
    {
        $this->CambiarAtributoEstado($this->model);
        $this->emit('render');
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Cambio de estado al registro " . $this->nombre . " exitosamente."
        ]);
    }
}
