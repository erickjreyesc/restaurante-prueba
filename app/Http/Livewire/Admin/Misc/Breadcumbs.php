<?php

namespace App\Http\Livewire\Admin\Misc;

use Livewire\Component;

class Breadcumbs extends Component
{
    public $title;

    public function mount($title)
    {
        $this->title = $title;
    }

    public function render()
    {
        return view('livewire.admin.misc.breadcumbs');
    }
}
