<?php

namespace App\Traits; 

trait ValidateTrait
{
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}