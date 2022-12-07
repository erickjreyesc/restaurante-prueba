<div>
    <div wire:ignore>
        @if (!is_null($smalltitle))
        <{{$tag}} class="title-main small-title">{{$smalltitle}} @if ($requiredtitle)
            <span class="text-danger required-title">*</span>
            @endif
        </{{$tag}}>
        @endif
    </div>
</div>
