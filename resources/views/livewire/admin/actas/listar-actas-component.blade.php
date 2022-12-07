<div>
    <livewire:admin.misc.breadcumbs :title="$formtitle" />
    <div class="container">
        <div class="row">
            <div class="py-2 col-12 align-content-middle">
                <h1 class="title-index d-inline">{{$formtitle}}</h1>
                <a class="btn btn-success float-end" href="{{ route('actas.agregar') }}">
                    <i class="me-1 fas fa-plus"></i>Agregar
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="mb-2 input-group">
                    <x-jet-input type="text" class="form-control" placeholder="Buscar" wire:model='search' />
                    <x-button class="btn btn-reset" type="button" wire:click.prevent="resetSearch()">
                        <i class="fas fa-undo me-1"></i>Restablecer
                    </x-button>
                </div>
                <div wire:init="loadData">
                    <table class="table" wire:loading.attr="disabled" wire:loading.class="bg-gray"
                        wire:target="loadData">
                        <thead class="text-center admin-table">
                            <tr>
                                <th scope="col">Codigo</th>
                                <th scope="col">Tipo de Reunión</th>
                                <th scope="col">Detalles</th>
                                <th scope="col">Seguimiento</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $key => $item)
                            @if ($readyToLoad)
                            <tr>
                                <td>{{ $item->codigo }}</td>
                                <td>{{ $item->tipo_reunion->nombre }}</td>
                                <td>
                                    <b>Convocador: </b>{{ $item->nombre_convocador }} <br>
                                    <b>Cargo: </b>{{ $item->cargo_convocador }} <br>
                                    <b>Departamento: </b>{{ $item->departamento_convocador }} <br>
                                    <b>Objetivo: </b>{!! $item->nombre_convocador !!} <br>
                                    <b>Cant. Archivos: </b> {{ ($item->archivo->count() > 0) ? $item->archivo->count() : 'Sin archivos cargados' }} <br>
                                    <b>Cant. Participantes: </b> {{ ($item->archivo->count() > 0) ? $item->archivo->count() : 'Sin archivos cargados' }} <br>
                                    <b>Cant. Firmantes: </b> {{ ($item->archivo->count() > 0) ? $item->archivo->count() : 'Sin archivos cargados' }} <br>
                                    <b>Convocatoria:</b> {{ ($item->archivo->count() > 0) ? $item->archivo->count() : 'Sin archivos cargados' }}.
                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="btn-group float-end">
                                        <button type="button" class="text-white btn btn-primary dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="text-white fas fa-list"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a class="btn" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="Editar a {{ $item->codigo }}"
                                                    href="{{ route('actas.editar', ['reunion'=>$item]) }}">
                                                    <i class="fas fa-pen text-warning"></i> Editar
                                                </a>
                                            </li>
                                            <li>
                                                <button type="button" class="btn" data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom" title="Eliminar a {{ $item->nombre }}"
                                                    wire:click.prevent="deleteConfirm({{$item}})">
                                                    <i class="fas fa-trash text-danger"></i> Eliminar
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @else
                            @if ($key == 0)
                            <tr>
                                <td colspan="3" rowspan="1">Cargando datos</td>
                            </tr>
                            @endif
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="float-end">
                    {{ $results->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
