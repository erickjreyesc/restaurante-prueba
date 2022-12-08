<?php

namespace App\Http\Livewire\Misc;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class SetImagenes extends Component
{
    public $imagenes_id;
    public $link;
    public $width;
    public $height;
    public $class;

    public function mount(Model $model, $class = null, $width = 480, $height = 320)
    {
        $this->imagenes_id = $model->id;
        if (!is_null($model->imagenes)) {
            if (Storage::disk('public')->exists($model->imagenes->imagen_url)) {
                $this->link = Storage::url($model->imagenes->imagen_url);
            } else {
                $this->link = 'images/sin_imagen.png';
            }
        } else {
            $this->link = 'images/sin_imagen.png';
        }
        $this->width = $width;
        $this->height = $height;
        $this->class = $class;
    }

    public function render()
    {
        return view('livewire.misc.set-imagenes');
    }
}
