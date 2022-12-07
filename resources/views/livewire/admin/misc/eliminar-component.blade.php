<div>
    <div class="d-inline">
        @if ($mode == "btn")
        <button type="button" class="btn btn-sm btn-danger rounded-circle" data-bs-toggle="tooltip"
            data-bs-placement="bottom" title="Eliminar al registro {{ $nombre }}" wire:click.prevent="deleteConfirm()">
            <i class="fas fa-trash text-white"></i>
        </button>
        @else
        <x-button type="button" class="btn " wire:click.prefetch="deleteConfirm()" data-bs-toggle="tooltip"
            data-bs-placement="bottom" title="Eliminar al registro {{ $nombre }}">
            <i class="fas fa-trash text-danger"></i> Eliminar
        </x-button>
        @endif
    </div>
</div>