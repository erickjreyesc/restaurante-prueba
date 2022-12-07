<?php

namespace App\Http\Livewire\Admin\Security;

use App\Models\Params\Dependencias;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Password;

class Usuarios extends Component
{
    use WithPagination;
    //use LivewireTrait;
   // use CMSTrait;
   // use ListSearchTrait;

    public $breadcumbs = 'Usuario';
    public $formtitle = 'Agregar Usuario';
    public $usuario = null;
    public $buscar = null;
    public $id = null;
    public $email = null;
    public $estado = 0;
    public $editshow = false;
    public $dependencia = null;
    public $rol;

    protected $listeners = ['render' => 'render', 'delete' => 'delete'];

    public function resetSearch()
    {
        $this->reset(['buscar']);
    }

    public function rules()
    {
        return [
            'usuario' => [
                'required',
                'string_user',
                'max:100',
                Rule::unique(User::getTableName(), 'usuario')->ignore($this->id, 'id')->withoutTrashed()
            ],
            'email' => [
                'required',
                'email:rfc',
                'max:100',
                Rule::unique(User::getTableName(), 'email')->ignore($this->id, 'id')->withoutTrashed()
            ],
            'rol' => 'required|exists:roles,id|required',
            'dependencia' => 'required|exists:dependencias,id|required',
            'estado' => 'boolean|nullable',
        ];
    }

    public function cancelForm()
    {
        $this->resetErrorBag();
        $this->reset(['buscar', 'usuario', 'email', 'estado', 'formtitle', 'rol', 'id', 'editshow', 'dependencia']);
    }

    public function render()
    {
        $buscar = '%' . $this->buscar . '%';
        $usuarios = User::where('id', '!=', auth()->user()->id)
            ->where('usuario', 'like', '%' . $buscar . '%')
            ->orwhere('email', 'like', '%' . $buscar . '%')
            ->orderby('estado', 'DESC')
            ->paginate(15);
        //$dependencias = Dependencias::where('estado', 1)->get();
        $roles = Role::where('estado', 1)->get();
        return view('livewire.admin.security.usuarios', compact('usuarios', 'dependencias', 'roles'));
    }

    public function store()
    {
        $this->validate();

        try {
            DB::beginTransaction();
            $contrasena = $this->StrRandom(15);
            $usuario = User::create([
                'usuario' => $this->usuario,
                'email' => $this->email,
                'contrasena' => Hash::make($contrasena, ['rounds' => 15]),
                'dependencia_id' =>  $this->dependencia
            ]);

            $usuario->assignRole($this->rol);

            Password::sendResetLink([
                'email' => $usuario->email
            ]);

            DB::commit();

            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Usuario " . $this->usuario . " creado exitosamente."
            ]);

            $this->emit('render');

            $this->cancelForm();
        } catch (\Throwable $th) {
            DB::rollBack();
            if ($th->getCode() == 10061) {
                $this->dispatchBrowserEvent('alert', [
                    'type' => 'warning',
                    'message' => __('backend.errors.redis')
                ]);
            } else {
                $this->dispatchBrowserEvent('alert', [
                    'type' => 'error',
                    'message' => "Hubo un error al crear el usuario y enviar el correo."
                ]);
            }
        }
    }
    public function change(User $user)
    {
        $this->CambiarAtributoEstado($user);
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Cambio de estado al registro " . $user->usuario . " exitosamente."
        ]);
    }

    /**
     * * Write code on Method
     * *
     * * @return response()
     * */
    public function deleteConfirm(User $user)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => __('backend.model.alerts.delete-title'),
            'text' => __('backend.model.alerts.delete', ['value' => $user->usuario]),
            'id' => $user->id
        ]);
    }

    public function delete(User $user)
    {
        $user->delete();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => __('backend.model.resource.deleted', [
                'value' => $user->nombre
            ])
        ]);
        $this->cancelform();
    }

    public function editar(User $user)
    {
        $this->editshow = true;
        $this->id = $user->id;
        $this->usuario = $user->usuario;
        $this->email = $user->email;
        $this->estado = $user->estado;
        $this->dependencia = $user->dependencia_id;
        $this->rol = (count($user->roles) > 0) ? $user->roles[0]->id : null;
        $this->formtitle = 'Editar Usuario ' . $this->usuario;
    }

    public function update(User $user)
    {
        $this->validate();

        try {
            $user->fill([
                'usuario' => $this->usuario,
                'email' => $this->email,
                'estado' => ($this->estado) ? 1 : 0,
                'dependencia_id' =>  $this->dependencia
            ])->save();

            $user->syncRoles($this->rol);

            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Usuario " . $user->usuario . " Actualizado exitosamente."
            ]);

            $this->cancelForm();
        } catch (\Throwable $th) {
            if ($th->getCode() == 10061) {
                $this->dispatchBrowserEvent('alert', [
                    'type' => 'warning',
                    'message' => __('backend.errors.redis')
                ]);
            } else {
                $this->dispatchBrowserEvent('alert', [
                    'type' => 'error',
                    'message' => "Hubo un error al actualizar el usuario: " . $this->usuario . " ."
                ]);
            }
        }
    }

    public function resetContrasena(User $usuario)
    {
        try {
            DB::beginTransaction();
            $contrasena = $this->StrRandom(15);
            $usuario->contrasena = Hash::make($contrasena, ['rounds' => 15]);
            $usuario->save();

            Password::sendResetLink([
                'email' => $usuario->email
            ]);

            DB::commit();

            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Nueva contraseña enviada a " . $usuario->usuario
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            if ($th->getCode() == 10061) {
                $this->dispatchBrowserEvent('alert', [
                    'type' => 'warning',
                    'message' => __('backend.errors.redis')
                ]);
            } else {
                $this->dispatchBrowserEvent('alert', [
                    'type' => 'error',
                    'message' => __('backend.errors.base', [
                        'code' => $th->getCode(),
                        'message' => $th->getMessage()
                    ])
                ]);
            }
        }
    }
}
