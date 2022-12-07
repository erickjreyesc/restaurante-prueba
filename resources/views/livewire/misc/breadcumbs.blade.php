<div>
    <div class="container">
        <div class="row">
            <div class="col-12 py-2">
                <nav aria-label="breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb d-flex align-items-center">
                        <li class="breadcrumb-item">
                            <a href="{{ route('Inicio') }}" class="text-gray no-bullets">
                                Inicio
                            </a>
                        </li>
                        @foreach ($breadtitle as $k=> $item)
                        @if ($loop->last)
                        <li class="breadcrumb-item active" aria-current="page">
                            <span class="text-rose">
                                {{ $item['title'] }}
                            </span>
                        </li>
                        @else
                        <li class="breadcrumb-item">
                            @if (!is_null($item['slug']))
                            <a href="{{ route($item['route'], ['categoria'=>$item['slug']]) }}" class="text-gray no-bullets text-rose">{{$item['title']}}</a>
                            @else
                            <a href="#" class="text-gray no-bullets">{{$item['title']}}</a>
                            @endif
                        </li>
                        @endif
                        @endforeach
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
