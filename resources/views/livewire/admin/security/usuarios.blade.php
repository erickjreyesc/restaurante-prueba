<div>
    <livewire:admin.misc.breadcumbs title="Usuarios" />
    <div class="container">
        <div class="row">
            <div class="py-2 col-12 align-content-middle">
                <h1 class="title-index d-inline">{{$formtitle}}</h1>
                @hasrole('Administrador')
                <a class="btn text-success float-end" href="{{ route('roles.listar') }}">
                    <i class="me-1 fas fa-key"></i>Roles y permisos
                </a>
                @endhasrole
            </div>
            @canany(['usuarios.agregar', 'usuarios.editar' ])
            {{-- formulario --}}
            <div
                class="col-sm-12 {{ (auth()->user()->can('usuarios.agregar') || auth()->user()->can('usuarios.editar')) ? 'col-md-6 col-lg-4' : null}}">
                <form>
                    <div class="mb-3">
                        <label for="usuario" class="form-label fw-bold text-main">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="usuario" wire:model.defer="usuario" maxlength="100"
                            placeholder="Ingrese un nombre de Usuario">
                        @error('usuario')<span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold text-main">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" wire:model.defer="email" maxlength="150"
                            placeholder="Ingrese un Correo Electrónico">
                        @error('email')<span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-2">
                        <label for="tituloInput" class="form-label fw-bold text-opc">Dependencia</label>
                        <select wire:model='dependencia' class="form-control">
                            <option value="">Seleccione</option>
                            @foreach ($dependencias as $dependencia)
                            <option value="{{$dependencia->id}}">{{$dependencia->nombre}}</option>
                            @endforeach
                        </select>
                        @error('dependencia')<span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-2">
                        <div wire:ignore>
                            <livewire:admin.misc.label-help titulo='Rol'
                                texto='Seleccione rol acorde a la actividad que llevara el usuario. <b class="text-danger fw-bold">Requerido</b>. Para agregar un nuevo registro haga clic en el siguiente enlace <a href={{ route("roles.listar" )}}>Roles</a>.'
                                :wire:key="random_int(100000, 999999)" />
                        </div>
                        <select wire:model='rol' class="form-control">
                            <option value="">Seleccione</option>
                            @foreach ($roles as $rolItems)
                            <option value="{{$rolItems->id}}">{{$rolItems->name}}</option>
                            @endforeach
                        </select>
                        @error('rol')<span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    @if ($editshow)
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" wire:model="estado" id="visible">
                            <label class="form-check-label" for="estado">Estado</label>
                        </div>
                        @error('estado')<span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    @endif
                    <div class="flex-row-reverse mb-2 d-flex">
                        @if ($editshow)
                        @can("usuarios.editar")
                        <button type="button" class="px-4 py-2 btn btn-main" wire:click="update({{$id}})"
                            wire:loading.attr="disabled" wire:loading.class="bg-gray">
                            <i class="me-1 fas fa-save"></i>Actualizar
                        </button>
                        @endcan
                        @else
                        @can("usuarios.agregar")
                        <button type="button" class="px-4 py-2 btn btn-main me-1" wire:click="store()"
                            wire:loading.attr="disabled" wire:loading.class="bg-gray">
                            <i class="me-1 fas fa-save"></i>Guardar
                        </button>
                        @endcan
                        @endif
                    </div>
                </form>
            </div>
            {{-- fin formulario --}}
            @endcanany

            {{-- tabla --}}
            <div
                class="col-sm-12 {{ (auth()->user()->can('usuarios.agregar') || auth()->user()->can('usuarios.editar')) ? 'col-md-6 col-lg-8' : null}}">
                <div class="mb-2 input-group">
                    <input type="text" class="form-control" placeholder="Buscar" aria-label="Buscar"
                        aria-describedby="button-addon2" wire:model='buscar'>
                    <button class="btn btn-main" type="button" id="button-addon2" wire:click.prevent="resetSearch()">
                        <i class="fas fa-undo me-1"></i>Restablecer
                    </button>
                </div>
                <table class="table">
                    <thead class="admin-table">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Correo</th>
                            <th scope="col" width="150">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $key => $item)
                        <tr class="{{ (!$item->estado) ? 'inactive': ''}}">
                            <th scope=" row">{{$item->id}}</th>
                            <td>
                                {{$item->usuario}}
                                <figcaption class="figure-caption">{{$item->dependencia->nombre}}</figcaption>
                                @if (count($item->roles))
                                @foreach ($item->roles as $roles)
                                <figcaption class="figure-caption fw-bold">{{$roles->name. ((!$loop->last) ? ', ': null)
                                    }}</figcaption>
                                @endforeach
                                @endif
                            </td>
                            <td>{{ $item->email }}</td>
                            <td>
                                @canany(['usuarios.editar', 'usuarios.cambiar', 'usuarios.eliminar',
                                'usuarios.eliminar'])
                                <div class="btn-group float-end">
                                    <button type="button" class="text-white btn btn-primary dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="text-white fas fa-list"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        @can("usuarios.editar")
                                        <li>
                                            <button type="button" class="btn" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="Editando a {{ $item->usuario }}"
                                                wire:click.prevent="editar({{$item}})">
                                                <i class="fas fa-pen text-warning"></i> Editar
                                            </button>
                                        </li>
                                        @endcan
                                        @can("usuarios.cambiar")
                                        <li>
                                            <x-button type="button" class="btn " wire:click.prevent="change({{$item}})"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Cambiar estado a {{ $item->usuario }}">
                                                <i class="fas fa-sync text-info"></i> Cambiar de Estado
                                            </x-button>
                                        </li>
                                        @endcan
                                        @can("usuarios.eliminar")
                                        <li>
                                            <x-button type="button" class="btn "
                                                wire:click.prefetch="deleteConfirm({{$item}})" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom"
                                                title="Eliminar al registro {{ $item->usuario }}">
                                                <i class="fas fa-trash text-danger"></i> Eliminar
                                            </x-button>
                                        </li>
                                        @endcan
                                        @can("usuarios.reset")
                                        @if ($item->estado)
                                        <li>
                                            <x-button type="button" class="btn "
                                                wire:click.prefetch="resetContrasena({{$item->id}})"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Enviar contraseña a  {{ $item->usuario }}">
                                                <i class="fas fa-key text-success"></i> Enviar contraseña
                                            </x-button>
                                        </li>                             
                                        @endif
                                        @endcan               
                                    </ul>
                                </div>
                                @endcanany
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-end-12 mx-2 my-5">
                    {{ $usuarios->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
