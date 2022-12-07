<div wire:ignore>
    <div class="d-flex justify-content-between {{  $border  ? 'border-bottom mb-2' : ''  }} ">
        <div class="d-inline">
            <label for="keywords" class="form-label fw-bold" for="{{$titulo.'Input'}}">
                {{$titulo}}
            </label>
        </div>
        @if (!is_null($texto))
        <div class="d-inline text-right" wire:ignore>
            <div class="btn-group">
                <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-question-circle {{$color}}"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end px-3 content-help">
                    <li>{!!$texto!!}</li>
                </ul>
            </div>
        </div>
        @endif
    </div>
</div>
