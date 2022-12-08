<div>
    <div class="{{ ($mode == "btn") ? 'd-btn-block': '' }}">
        @if ($mode == "btn")
        <button type="button" class="btn btn-sm btn-info rounded-circle" title="Cambiar estado al registro {{ $nombre }}" wire:click.prevent="change()">
            <i class="fas fa-sync text-white"></i>
        </button>
        @else
        <x-button type="button" class="btn " wire:click.prevent="change()" title="Cambiar estado a {{ $nombre }}">
            <i class="fas fa-sync text-info"></i> Cambiar de Estado
        </x-button>
        @endif
    </div>
</div>