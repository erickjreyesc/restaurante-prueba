<?php

namespace App\Http\Livewire\Admin\Actas;

use App\Models\Actas\Reunion;
use App\Models\Actas\TipoReunion;
use App\Models\Param\Dependencias;
use App\Rules\EmailMultipleRule;
use App\Traits\UtilityTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormActasComponent extends Component
{
    use UtilityTrait;
    use WithFileUploads;

    public $formtitle = 'Listado de Actas';
    public $reunion;
    public $reunion_id;
    public $objetivo, $nombre_convocador, $departamento_convocador, $cargo_convocador, $orden, $conclusiones, $tipo_reunion_id, $dependencia;
    public $fecha_reunion, $lugar_reunion, $fecha_proxima, $lugar_proxima;
    public $firmante = [], $cargo_firmante = [], $firmado = [];
    public $avance, $compromiso, $correo_responsable, $fecha_limite, $responsable;
    public $countResp = 1, $countSign = 1;
    public $invitados = [];

    public $archivos = [];

    public function mount(Reunion $reunion)
    {
        if (Route::currentRouteName() != "actas.agregar") {
            $this->formtitle = 'Editando registro: ' . $reunion->codigo;
            $this->reunion = $reunion;
            $this->reunion_id = $reunion->id;
        } else {
            $this->formtitle = 'Agregar nuevo documento';
        }
    }

    public function rules()
    {
        return [
            'tipo_reunion_id' => [
                'required', 'exists:' . TipoReunion::getTableName() . ',id'
            ],
            'dependencia' => [
                'required', 'exists:' . Dependencias::getTableName() . ',id'
            ],
            'fecha_reunion' => [
                'required', 'date'
            ],
            'fecha_proxima' => [
                'nullable', 'date', 'after:' . Carbon::now()
            ],
            'lugar_reunion' => [
                'required', 'string', 'min:2' , 'max:200'
            ],
            'lugar_proxima' => [
                'nullable', 'string', 'min:2' , 'max:200'
            ],
            'nombre_convocador' => [
                'required', 'string', 'min:2', 'max:100'
            ],
            'cargo_convocador' => [
                'required', 'string', 'min:2', 'max:100'
            ],
            'objetivo' => [
                'required', 'string', 'min:2'
            ],
            'orden' => [
                'required', 'string', 'min:2'
            ],
            'conclusiones' => [
                'required', 'string', 'min:2'
            ],
            'invitados' => [
                'required_with:fecha_proxima', new EmailMultipleRule()
            ]

        ];
    }

    public function cancelform()
    {
        $this->editshow = false;
        $this->resetErrorBag();
        $this->reset([
            'objetivo', 'nombre_convocador', 'dependencia', 'cargo_convocador', 'orden', 'conclusiones', 'tipo_reunion_id', 'formtitle', 'reunion', 'reunion_id', 'archivos'
        ]);
    }

    public function render()
    {
        $dependencias = Dependencias::where('estado', 1)->get();
        $tipo_reuniones = TipoReunion::where('estado', 1)->get();
        return view('livewire.admin.actas.form-actas-component', compact('tipo_reuniones', 'dependencias'));
    }

    public function store()
    {
        $this->validate();

        try {

            DB::beginTransaction();

            $reunion_data = array(
                'objetivo' => $this->objetivo,
                'nombre_convocador' => $this->nombre_convocador,
                'cargo_convocador' => $this->cargo_convocador,
                'orden' => $this->orden,
                'conclusiones' => $this->conclusiones,
                'tipo_reunion_id' => $this->tipo_reunion_id,
                'departamento' => $this->dependencia
            );

            if (!is_null($this->reunion)) {
                $reuniones = $this->reunion->fill($reunion_data)->save();
            } else {
                $reuniones = Reunion::create($reunion_data);
            }

            $reuniones->calendario()->create([
                'fecha_reunion' => $this->fecha_reunion,
                'lugar_reunion' => $this->lugar_reunion,
                'fecha_proxima' => (isset($this->fecha_proxima)) ? $this->fecha_proxima : null,
                'lugar_proxima' => (isset($this->lugar_proxima)) ? $this->lugar_proxima : null
            ]);

            if (isset($this->fecha_proxima)) {
                dd($this->invitados);
                foreach ($this->invitados as $key => $email) {
                    $reuniones->invitados()->create([
                        'email' => $email,
                    ]);
                }
            }

            if (!is_null($this->archivos)) {
                foreach ($this->archivos as $archivo) {
                    $storefile = $archivo->store('solicitudes/' . $this->setDirectory($reuniones->codigo), 'public');
                    $reuniones->archivo()->create([
                        'media_link' => $storefile,
                        'media_titulo' => $reuniones->codigo,
                        'mime_type' => $archivo->getMimeType(),
                    ]);
                }
            }

            DB::commit();

            // Se crea el evento de notificacion
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' =>  __('backend.model.resource.updated', [
                    'value' => $reuniones->codigo
                ])
            ]);

            return redirect()->route('actas.listar');
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => __('backend.errors.base', [
                    'code' => $th->getCode(),
                    'message' => $th->getMessage()
                ])
            ]);
        }
    }

    public function addSignFields()
    {
        $this->countSign++;
    }

    public function removeSignFields()
    {
        $this->countSign--;
    }

    public function addCommitmentFields()
    {
        $this->countResp++;
    }

    public function removeCommitmentFields()
    {
        $this->countResp--;
    }
}
