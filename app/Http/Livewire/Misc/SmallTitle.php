<?php

namespace App\Http\Livewire\Misc;

use App\Traits\UtilityTrait;
use Livewire\Component;

class SmallTitle extends Component
{
    use UtilityTrait;

    public $smalltitle;
    public $tag;

    public function mount( $smalltitle, $tag)
    {
        $this->smalltitle = $this->CamellCaseString($smalltitle);
        $this->tag = $tag;
    }

    public function render()
    {
        return view('livewire.misc.small-title');
    }
}
