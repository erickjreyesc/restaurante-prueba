<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Livewire\WithPagination;

trait TableTrait
{
    use WithPagination;
    
    public $readyToLoad = false;
    protected $paginationTheme = "bootstrap";
    public $buscar;

    public function rules()
    {
        return [
            'buscar' => [
                'required',
                'string',
            ]
        ];
    }

    public function loadData()
    {
        $this->readyToLoad = true;
    }

    public function resetSearch()
    {
        $this->reset(['buscar']);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
