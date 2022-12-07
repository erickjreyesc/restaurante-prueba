<div>
    <div class="container">
        <div class="row pt-4">
            <div class="d-flex bd-highlight">
                <div class="flex-fill bd-highlight">
                    <h5 class="text-main fw-bold">{{ $setting->configuracion_nombre }}</h5>
                <p>{{ $setting->configuracion_descripcion }}</p>
                </div>
                <div class="flex-fill bd-highlight align-middle">
                    <div class="form-check form-switch float-end">
                        <input class="form-check-input" type="checkbox" id="flexSwitchEstado" wire:model="active" wire:change.debounce.1s="update({{$setting}})">
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>
