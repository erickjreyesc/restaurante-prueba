<div>
    <div>
        @if (!is_null($title))
        <{{$tag}} class="title-main">{{$title}}</{{$tag}}>
        @endif
        @if (!is_null($subtitle))
        <{{$tag}} class="title-main">{{$subtitle}}</{{$tag}}>
        @endif
        <hr class="hr-title hr-title-main">
    </div>
</div>
