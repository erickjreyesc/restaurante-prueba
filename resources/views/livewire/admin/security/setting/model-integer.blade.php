<div>
    <div class="container">
        <div class="row pt-4">
            <div class="d-flex bd-highlight">
                <div class="flex-fill bd-highlight">
                    <h5 class="text-main fw-bold">{{ $setting->configuracion_nombre }}</h5>
                    <p>{{ $setting->configuracion_descripcion }}</p>
                </div>
                <div class="col-xs-1">
                    <div class="flex-fill bd-highlight align-middle ">
                        <input type="number" class="form-control" wire:model.lazy='value' min="0" max="60" wire:change.debounce.1s="update({{$setting}})">
                        @error('value')<span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
