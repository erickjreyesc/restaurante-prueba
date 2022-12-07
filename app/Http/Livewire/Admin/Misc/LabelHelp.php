<?php

namespace App\Http\Livewire\Admin\Misc;

use Livewire\Component;

class LabelHelp extends Component
{
    public $titulo;
    public $texto;
    public $border;
    public $color;

    public function mount($titulo, $border = false, $texto=null, $color = 'help')
    {
        $this->titulo = $titulo;
        $this->texto = $texto;
        $this->border = $border;
        $this->color = $color;
    }

    public function render()
    {
        return view('livewire.admin.misc.label-help');
    }
}
