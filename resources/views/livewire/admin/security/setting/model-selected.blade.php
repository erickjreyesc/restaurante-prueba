<div>
    <div class="container">
        <div class="row pt-4">
            <div class="d-flex bd-highlight">
                <div class="flex-fill bd-highlight">
                    <h5 class="text-main fw-bold">{{ $setting->configuracion_nombre }}</h5>
                    <p>{{ $setting->configuracion_descripcion }}</p>
                </div>
                <div class="col-xs-12">
                    <select wire:model='value' class="form-control" wire:change="update()">
                        <option value="">Seleccione</option>
                        @foreach ($selecteds as $selected)
                        <option value="{{$selected->id}}">{{ Str::ucfirst(Str::lower($selected->nombre)) }}</option>
                        @endforeach
                    </select>
                    @error('value')<span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
    </div>
</div>
