<?php

namespace App\Http\Livewire\Admin\Security\Permisos;

use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    //use CMSTrait;
    use WithPagination;
    //use LivewireTrait;
    //use ListSearchTrait;

    public $formtitle = "Roles y permisos";

    public $nombre = null;
    public $editshow = false, $formedit = false;
    public $rol;
    public $SelectPermisos = [];

    protected $listeners = ['listar' => 'render'];


    public function rules()
    {
        return [
            'nombre' => [
                'required',
                'string',
                'max:100',
            ]
        ];
    }

    public function cancelForm()
    {
        $this->resetErrorBag();
        $this->reset(['nombre', 'rol', 'formedit', 'editshow', 'SelectPermisos']);
    }

    public function render()
    {
        $roles = Role::paginate(10);
        $permisos = Permission::all();
        return view('livewire.admin.security.permisos.roles', compact('roles', 'permisos'));
    }

    public function store()
    {
        $this->validate([
            'nombre' => [
                Rule::unique('roles', 'name')
            ]
        ]);
        $this->loading = true;

        try {
            DB::beginTransaction();
            $role = Role::create([
                'name' => $this->nombre,
                'guard_name' => 'web'
            ]);

            if (count($this->SelectPermisos) > 0) {
                $role->syncPermissions($this->SelectPermisos);
            }

            activity()
                ->causedBy(auth()->user()->id)
                ->performedOn($role)
                ->withProperties($role)
                ->log('created');

            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' =>  __('backend.model.resource.created', [
                    'value' => $this->nombre
                ])
            ]);

            DB::commit();

            $this->cancelForm();
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => __('backend.errors.base', [
                    'code' => $th->getCode(),
                    'message' => $th->getMessage()
                ])
            ]);
        } finally {
            $this->loading = false;
        }
    }

    public function edit(Role $role)
    {
        $this->editshow = true;
        $this->rol = $role;
        $this->nombre = $role->name;
        $this->SelectPermisos = $this->rol->permissions()->pluck('permissions.id')->map(
            function ($group) {
                return strval($group);
            }
        )->toArray();
    }

    public function update()
    {
        $this->validate([
            'nombre' => [
                Rule::unique('roles', 'name')->ignore($this->rol->id, 'id')
            ]
        ]);
        $this->loading = true;

        try {
            DB::beginTransaction();
            $this->rol->fill([
                'name' => $this->nombre,
                'guard_name' => 'web'
            ])->save();

            if (count($this->SelectPermisos) > 0) {
                $this->rol->syncPermissions($this->SelectPermisos);
            }

            activity()
                ->causedBy(auth()->user()->id)
                ->performedOn($this->rol)
                ->withProperties($this->rol)
                ->log('updated');

            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' =>  __('backend.model.resource.updated', [
                    'value' => $this->nombre
                ])
            ]);

            DB::commit();
            $this->cancelForm();
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => __('backend.errors.base', [
                    'code' => $th->getCode(),
                    'message' => $th->getMessage()
                ])
            ]);
        } finally {
            $this->loading = false;
        }
    }
}
