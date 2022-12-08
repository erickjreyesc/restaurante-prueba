<?php

namespace App\Http\Livewire\Misc;

use App\Traits\UtilityTrait;
use Livewire\Component;

class Title extends Component
{
    use UtilityTrait;

    public $title;
    public $subtitle;
    public $tag;

    public function mount($tag, $title = null, $subtitle = null)
    {
        $this->title = (is_null($title)) ? null : $this->CamellCaseString($title);
        $this->subtitle = (is_null($subtitle)) ? null : $this->CamellCaseString($subtitle) ;
        $this->tag = $tag;
    }

    public function render()
    {
        return view('livewire.misc.title');
    }
}
