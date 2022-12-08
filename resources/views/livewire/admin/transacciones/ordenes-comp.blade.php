<div>
    <livewire:admin.misc.breadcumbs :title="$formtitle" />
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h5 class="my-2">Datos del Cliente</h5>
            </div>
            {{-- formulario --}}
            <div class="ol-sm-12 col-md-6 col-lg-6 mb-2">
                <label for="nombre" class="form-label fw-bold text-main">Nombre</label>
                <input type="text" class="form-control" id="nombre" wire:model="nombre" maxlength="100"
                    placeholder="Ingrese un nombre del cliente">
                @error('nombre')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="ol-sm-12 col-md-6 col-lg-6 mb-2">
                <label for="dni" class="form-label fw-bold text-main">DNI</label>
                <input type="text" class="form-control" id="dni" wire:model="dni" maxlength="15"
                    placeholder="Ingrese un documento de identidad del cliente">
                @error('dni')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="ol-sm-12 mb-2">
                <div class="mb-2">
                    <label for="direccion" class="form-label fw-bold text-main">Dirección fiscal</label>
                    <textarea name="direccion" id="direccion" wire:model='direccion' class="form-control" rows="3"
                        placeholder="Direccion del cliente"></textarea>
                    @error('direccion')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            {{-- fin formulario --}}
        </div>
        <div class="row d-flex justify-content-end align-items-end">
            <div class="col-12 align-content-middle py-2">
                <h5 class="d-inline">Datos de la venta</h5>                
            </div>
            @for ($i = 0; $i < $count; $i++)
            @endfor
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-2">
                <label for="tipo_producto" class="form-label fw-bold text-opc">Tipo Producto</label>
                <select wire:model='tipo_producto_id' class="form-control">
                    <option value="">Seleccione</option>
                    @foreach ($tipo_productos as $tproducto)
                        <option value="{{ $tproducto->id }}">{{ $tproducto->nombre }}</option>
                    @endforeach
                </select>
                @error('tipo_producto_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="mb-2">
                    <label for="producto_id" class="form-label fw-bold text-opc">Producto</label>
                    <select wire:model='producto_id' class="form-control">
                        <option value="">Seleccione</option>
                        @foreach ($producto as $prod)
                            <option value="{{ $prod->producto_id }}">{{ $prod->producto->nombre }}</option>
                        @endforeach
                    </select>
                    @error('producto_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                <div class="mb-2">
                    <label for="cantidad" class="form-label fw-bold text-main">Precio</label>
                    <input type="number" class="form-control" id="cantidad" wire:model="precio_selected" disabled>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                <div class="mb-2">
                    <label for="cantidad" class="form-label fw-bold text-main">Cantidad</label>
                    <input type="number" class="form-control" id="cantidad" wire:model.lazy="cantidad"
                        max="{{ $cantmax }}" placeholder="Ingrese un cantidad para el producto">
                    @error('cantidad')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-1 mb-2">
                <div class="d-inline float-end">
                    <button type="button" class="btn btn-primary text-white" wire:click.prevent="AgregarProducto()">
                        Agregar
                    </button>
                </div>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Concepto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < $count; $i++)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $resumen[$i]['nombre'] }}</td>
                                <td>{{ $resumen[$i]['precio'] }}</td>
                                <td>{{ $resumen[$i]['cantidad'] }}</td>
                                <td class="text-end">{{ $resumen[$i]['total'] }}</td>
                            </tr>
                        @endfor
                    </tbody>
                    <tbody>
                        <tr>
                            <td class="text-end pe-2 fw-bold" colspan="4">
                                Total a pagar
                            </td>
                            <td class="text-end">
                                {{ $total }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-12">
                <button class="btn btn-success rounded float-end text-white" wire:click.prevent="store()"
                    wire:loading.attr="disabled" wire:loading.class="bg-gray" wire:target="store">
                    Processar
                </button>
            </div>
        </div>
    </div>
</div>
