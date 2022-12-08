<?php

namespace App\Http\Livewire\Admin\Security;

use Livewire\Component;
use App\Models\Config\Registro;
use App\Models\User;
use App\Traits\DatetimeTrait;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Spatie\Activitylog\Models\Activity;

class Registros extends Component
{
    use WithPagination;
    use DatetimeTrait;

    public $formtitle = 'Registros de actividades en base de datos.';
    public $inicio = null;
    public $final = null;
    public $usuario = null;
    public $search = null;

    protected $paginationTheme = "bootstrap";
    protected $listeners = ['render' => 'render'];

    public function resetSearch()
    {
        $this->reset(['inicio', 'final', 'usuario', 'search']);
    }

    public function rules()
    {
        return [
            'inicio' => [
                'required', 'date'
            ],
            'final' => [
                'required', 'after_or_equal:inicio',
            ],
            'usuario' => 'nullable|exists:users,id',
            'search' => 'nullable',
        ];
    }

    public function render()
    {
        $iniciolog = Activity::first(['created_at']);
        $iniciolog = $this->ConvertStandardDate($iniciolog->created_at);
        $listamodellogs = DB::table('activity_log')->select('subject_type')->groupBy('subject_type')->get();
        $users = User::all();
        $results = [];
        if ((isset($this->inicio) && isset($this->final))) {
            $results = Registro::whereBetween('created_at', [$this->inicio . ' 00:00:00', $this->final . ' 23:59:59']);

            if (!empty($this->search)) {
                $results = $results->search($this->search)->paginate(15);
            }

            if (!empty($this->usuario)) {
                $results = $results->where('causer_id', $this->usuario)->paginate(15);
            }

            $results = $results->paginate(15);
        }

        return view('livewire.admin.security.registros', compact('iniciolog', 'users', 'listamodellogs', 'results'));
    }

    public function searchlog()
    {
        $this->validate();
        $this->emit('render');
    }
}
