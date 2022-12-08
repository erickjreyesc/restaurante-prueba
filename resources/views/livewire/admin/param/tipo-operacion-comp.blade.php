<div>
    <livewire:admin.misc.breadcumbs :title="$formtitle" />
    <div class="container">
        <div class="row">
            <div class="py-2 col-12 align-content-middle">
                <h1 class="title-index d-inline">{{$formtitle}}</h1>
            </div>

            {{-- tabla --}}
            <div class="col-sm-12 mt-3">
                <table class="table">
                    <thead class="admin-table">
                        <tr>
                            <th scope="col">Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $key => $item)
                        <tr class="{{ (!$item->estado) ? 'inactive': ''}}">
                            <td>
                                {{ $item->nombre }}<br>
                                <figcaption class="figure-caption">{{$item->descripcion}}</figcaption>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-end-12 mx-2 my-5">
                    {{ $results->links() }}
                </div>
            </div>
        </div>
    </div>
</div>