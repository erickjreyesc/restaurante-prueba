<div>
    <livewire:admin.misc.breadcumbs title="Registros" />
    <div class="container">
        <div class="row">
            <div class="col-12 align-content-middle pb-3">
                <h1 class="title-index d-inline">{{ $formtitle }}</h1>
                @if (count($results) > 0)
                    <a class="btn btn-success float-end" target="_blank"
                        href="{{ route('export.xls', ['inicio' => $inicio, 'final' => $final, 'usuario' => $usuario, 'buscar' => $search]) }}">
                        <i class="fas fa-file-csv me-1"></i> Exportar
                    </a>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                <div class="mb-2">
                    <div wire:ignore>
                        <livewire:admin.misc.label-help titulo='Fecha inicio'
                            texto='Asigne un titulo o nombre a la fecha a agendar. <b class="text-danger fw-bold">Requerido</b> y máximo <b class="text-danger fw-bold">255</b> caracteres'
                            :wire:key="random_int(100000, 999999)" />
                    </div>
                    <input type="hidden" name="iniciolog" id="iniciolog" value="{{$iniciolog}}">
                    <div wire:ignore>
                        <input type="text" class="form-control datepicker" id="inicioInput" wire:model.defer='inicio'
                            value="{{ $inicio }}" placeholder="Ingrese una fecha de inicio" readonly x-data
                            x-ref="input" onchange="this.dispatchEvent(new InputEvent('input'))" autocomplete="off"
                            data-provide="datepicker" data-date-autoclose="true" data-date-today-highlight="true"
                            x-on:change="$dispatch('input', $el.value)">
                    </div>
                    @error('inicio')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                <div wire:ignore>
                    <livewire:admin.misc.label-help titulo='Fecha Fin'
                        texto='Asigne un titulo o nombre a la fecha a agendar. <b class="text-danger fw-bold">Requerido</b> y máximo <b class="text-danger fw-bold">255</b> caracteres'
                        :wire:key="random_int(100000, 999999)" />
                </div>
                <div wire:ignore>
                    <input type="text" class="form-control datepicker" id="finalInput" wire:model.defer='final'
                        value="{{ $final }}" placeholder="Ingrese una fecha de final" readonly x-data
                        x-ref="input" onchange="this.dispatchEvent(new InputEvent('input'))" autocomplete="off"
                        data-provide="datepicker" data-date-autoclose="true" data-date-today-highlight="true"
                        x-on:change="$dispatch('input', $el.value)">
                </div>
                @error('final')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                <div wire:ignore>
                    <livewire:admin.misc.label-help titulo='Usuario'
                        texto='Seleccione el usuario <b class="text-danger fw-bold">Opcional</b>.'
                        :wire:key="random_int(100000, 999999)" />
                </div>
                <select wire:model.defer='usuario' class="form-control">
                    <option value="">Seleccione</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->usuario }}</option>
                    @endforeach
                </select>
                @error('usuario')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div wire:ignore>
                    <livewire:admin.misc.label-help titulo='Buscar' texto='Ingrese el texto de búsqueda'
                        :wire:key="random_int(100000, 999999)" />
                </div>
                <input type="text" class="form-control" placeholder="Buscar" aria-label="Buscar"
                    aria-describedby="button-addon2" wire:model='search'>
                @error('search')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 d-flex justify-content-end align-items-center">
                <button class="btn btn-success" wire:click.prevent='searchlog()'>
                    <i class="fas fa-search me-1"></i> Buscar
                </button>
                <button class="btn btn-danger ms-1" wire:click.prevent='resetSearch()'>
                    <i class="fas fa-undo me-1"></i> Limpiar
                </button>
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-12">
                <table class="table table-striped table-hover table-responsive">
                    <thead class="admin-table">
                        <tr>
                            <th scope="col">Fecha</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Entidad</th>
                            <th scope="col">Actividad</th>
                            <th scope="col">Datos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($results as $item)
                            <tr class="small">
                                <td>{{ $item->created_at }}</td>
                                <td>{{ !is_null($item->usuario) ? $item->usuario->usuario : 'sistema' }}</td>
                                <td>{{ $item->subject_type }}</td>
                                <td>{{ $item->description }}</td>
                                <td> {{ Str::limit($item->properties->toJson(JSON_UNESCAPED_SLASHES), 150, '...') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No hay resultados de la consulta</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
