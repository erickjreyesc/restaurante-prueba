<?php

namespace App\Http\Livewire\Misc;

use Livewire\Component;
use Illuminate\Support\Str;

class Breadcumbs extends Component
{
    public $breadtitle;
    public $setcontenido;

    public function mount($breadtitle, $setcontenido = null)
    {
        $this->setcontenido = $setcontenido;
        $this->breadtitle = $breadtitle;
    }

    public function render()
    {
        return view('livewire.misc.breadcumbs');
    }
}
