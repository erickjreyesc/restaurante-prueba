<?php

namespace App\Http\Livewire\Admin\Transacciones;

use App\Traits\UtilityTrait;
use Livewire\Component;

class OrdenesComp extends Component
{
    use UtilityTrait;
    
    public function render()
    {
        return view('livewire.admin.transacciones.ordenes-comp');
    }
}
