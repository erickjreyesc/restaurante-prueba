<?php

namespace App\Http\Livewire\Admin\Param;

use App\Models\Param\TipoOperacion;
use App\Traits\TableTrait;
use Livewire\Component;

class TipoOperacionComp extends Component
{
    use TableTrait;
    public $formtitle = "Tipos de operación en inventario";


    public function render()
    {
        $results = TipoOperacion::paginate(15);
        return view('livewire.admin.param.tipo-operacion-comp', compact('results'));
    }
}
