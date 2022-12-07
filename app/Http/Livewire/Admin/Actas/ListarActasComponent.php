<?php

namespace App\Http\Livewire\Admin\Actas;

use App\Models\Actas\Reunion;
use App\Traits\TableTrait;
use Livewire\Component;
use Livewire\WithPagination;

class ListarActasComponent extends Component
{ 
    use TableTrait;  

    public $search = null;
    public $formtitle = 'Listado Resumen de Actas';

    public function render()
    {
        $results = Reunion::search($this->search)->orderby('id', 'DESC')->paginate(15);
        return view('livewire.admin.actas.listar-actas-component', compact('results'));
    }
}
