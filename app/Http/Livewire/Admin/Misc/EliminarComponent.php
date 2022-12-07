<?php

namespace App\Http\Livewire\Admin\Misc;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class EliminarComponent extends Component
{
    public $model;
    public $mode;
    public $number;
    public $nombre;
    public $showOpen = false;

    protected $listeners = ['delete' => 'delete'];

    public function mount(Model $model, $nombre, $mode = 'btn')
    {
        $this->model = $model;
        $this->number =  $this->model->id;
        $this->mode = $mode;
        $this->nombre = $nombre;
    }

    public function render()
    {
        return view('livewire.admin.misc.eliminar-component');
    }

    /**
     * * Write code on Method
     * *
     * * @return response()
     * */
    public function deleteConfirm()
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => __('backend.model.alerts.delete-title'),
            'text' => __('backend.model.alerts.delete', ['value' => $this->number]),
            'id' => $this->number
        ]);
    }

    public function delete($id)
    {
        if ($this->model->id == $id) {
            if (!is_null($this->model->archivos)) {
                $this->destroyFileModel($this->model);
            }
            $this->model->delete();
            $this->emit('render');
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => __('backend.model.resource.deleted', [
                    'value' => $this->nombre
                ])
            ]);
        }
    }
}
