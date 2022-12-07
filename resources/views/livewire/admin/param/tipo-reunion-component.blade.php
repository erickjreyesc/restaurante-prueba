<div>
    <livewire:admin.misc.breadcumbs :title="$formtitle" />
    <div class="container">
        <div class="row">
            <div class="py-2 col-12 align-content-middle">
                <h1 class="title-index d-inline">{{$formtitle}}</h1>
            </div>
            {{-- formulario --}}
            <div class="col-sm-12 col-md-6 col-lg-4">
                <form>
                    <div class="mb-3">
                        <label for="nombre" class="form-label fw-bold text-main">Nombre</label>
                        <input type="text" class="form-control" id="nombre" wire:model.defer="nombre" maxlength="100"
                            placeholder="Ingrese un nombre del tipo de reunión">
                        @error('nombre')<span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="acronimo" class="form-label fw-bold text-main">Acrónimo</label>
                        <input type="text" class="form-control" id="acronimo" wire:model.defer="acronimo"
                            maxlength="10" placeholder="Ingrese un acrónimo para el tipo de reunión">
                        @error('acronimo')<span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label fw-bold text-main">Descripción</label>
                        <textarea name="descripcion" id="descripcion" wire:model='descripcion' class="form-control"
                            rows="6" placeholder="Describa brevemente la descripción para el tipo de reunión"></textarea>
                        @error('descripcion')<span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" wire:model="estado" id="visible">
                            <label class="form-check-label" for="estado">Estado</label>
                        </div>
                        @error('estado')<span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="flex-row-reverse mb-2 d-flex">
                        @if ($editshow)
                        @can("tipo-reunion.editar")
                        <button type="button" class="px-4 py-2 btn btn-main" wire:click="update()"
                            wire:loading.attr="disabled" wire:loading.class="bg-gray">
                            <i class="me-1 fas fa-save"></i>Actualizar
                        </button>
                        @endcan
                        @else
                        @can("tipo-reunion.agregar")
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

            {{-- tabla --}}
            <div class="col-sm-12 col-md-6 col-lg-8">
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
                            <th scope="col">Nombre</th>
                            <th scope="col" width="150"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $key => $item)
                        <tr class="{{ (!$item->estado) ? 'inactive': ''}}">
                            <td>
                                {{ $item->nombre }} - {{ $item->acronimo }} <br>
                                <figcaption class="figure-caption">{{$item->descripcion}}</figcaption>
                            </td>
                            <td>
                                <div class="btn-group float-end">
                                    <button type="button" class="text-white btn btn-primary dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="text-white fas fa-list"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <button type="button" class="btn" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="Editando a {{ $item->nombre }}"
                                                wire:click.prevent="editar({{$item}})">
                                                <i class="fas fa-pen text-warning"></i> Editar
                                            </button>
                                        </li>
                                        <li wire:ignore>
                                            @livewire('admin.misc.cambiar-component', ['model' => $results[$key], 'nombre' => $results[$key]->nombre, 'mode' => 'list'], key(rand()
                                            * $item->id))
                                        </li>
                                        <li wire:ignore>
                                            @livewire('admin.misc.eliminar-component', ['model' => $results[$key], 'nombre' => $results[$key]->nombre, 'mode' => 'list'],
                                            key(rand() * $item->id))
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-end-12 mx-2 my-5">
                    {{ $results->links() }}
                </div>
            </div>
        </div>
    </div>
</div>