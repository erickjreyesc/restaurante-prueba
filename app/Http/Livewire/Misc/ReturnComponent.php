<?php

namespace App\Http\Livewire\Misc;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class ReturnComponent extends Component
{
    public $title;
    public $code;
    public $text;
    public $route;
    public $textbutton;

    public function mount($code, $title, $textbutton = 'Ir al Inicio', $text = null,   $route = null)
    {
        $this->code = $code;
        $this->title = $title;
        $this->text = $text;
        $this->textbutton = $textbutton;
        $ruta = null;
        if (is_null($route) || ($route == 'login')) {
            $ruta = route('login');
        } else {
            $ruta = Route::currentRouteName();
        }

        $this->route = $ruta;
    }

    public function render()
    {
        return view('livewire.misc.return-component');
    }
}
