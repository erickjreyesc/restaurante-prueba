<div>
    <livewire:admin.misc.breadcumbs title="Roles y permisos" />
    <div class="container">
        <div class="row">
            <div class="col-12 align-content-middle pb-3">
                <h1 class="title-index d-inline">{{$formtitle}}</h1>
                <a class="btn btn-gray float-end" href="{{ route('usuario.listar') }}">
                    <i class="me-1 fas fa-angle-left"></i>Usuarios
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-4">
                <table class="table">
                    <thead class="admin-table">
                        <tr>
                            <th>Nombre</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $rol)
                        <tr>
                            <td>{{ $rol->name }}</td>
                            <td>
                                @if ( $rol->id != 1 )
                                <div class="btn-group btn-sm float-end">
                                    <button type="button" class="btn btn-primary text-white dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-list text-white"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <button type="button" class="btn" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" wire:click.prevent="edit({{$rol}})">
                                                <i class="fas fa-pen text-warning"></i> Editar
                                            </button>
                                        </li>

                                    </ul>
                                </div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-xs-12 col-md-8">
                <div class="mb-2">
                    <livewire:admin.misc.label-help titulo='Rol'
                        texto='Ingrese el nombre del rol. <b class="text-danger fw-bold">Requerido</b> y máximo <b class="text-danger fw-bold">100</b> caracteres'
                        :wire:key="random_int(100000, 999999)" />
                    <input type="text" class="form-control" placeholder="Ingrese el nombre del rol"
                        aria-describedby="button-addon2" wire:model='nombre'>
                    @error('nombre')<span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-2 mt-3">
                    <livewire:admin.misc.label-help titulo='Permisos' border=true
                        texto='Seleccione los permisos vinculados al Rol.'
                        :wire:key="random_int(100000, 999999)" />
                    <div class="row">
                        @foreach ($permisos as $key => $permiso)
                        <div class="col-xs-6 col-md-4">
                            <div class="form-check align-items-center py-1">
                                <input class="form-check-input" type="checkbox" value="{{$permiso->id}}"
                                    id="flexCheckDefault" wire:model="SelectPermisos">
                                <label class="form-check-label" for="flexCheckDefault">
                                    <small>{{ ucfirst(Str::lower($permiso->description)) }}</small>
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <hr>
                <div class="d-flex flex-row-reverse mb-2">
                    @if ($editshow)
                    <button type="button" class="btn btn-success px-4 py-2 ms-2" wire:click="update()"
                        wire:loading.attr="disabled" wire:target="update" wire:loading.class="bg-gray">
                        @if ($loading)
                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                        @else
                        <i class="me-1 fas fa-save"></i>
                        @endif
                        Actualizar
                    </button>
                    @else
                    <button type="button" class="btn btn-success px-4 py-2 ms-2" wire:click="store()"
                        wire:loading.attr="disabled" wire:loading.class="bg-gray" wire:target="store">
                        @if ($loading)
                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                        @else
                        <i class="me-1 fas fa-save"></i>
                        @endif
                        Guardar
                    </button>
                    @endif
                    <button type="button" class="btn btn-danger" wire:click.prevent="cancelForm()">
                    <i class="me-2 fas fa-times"></i>Cancelar
                </button>
                </div>
            </div>
        </div>
    </div>
</div>
