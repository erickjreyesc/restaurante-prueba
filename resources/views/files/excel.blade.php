<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
    <title>Exportar Archivo</title>
</head>

<body>
    <table>
        <thead>
            <th scope="col">Fecha</th>
            <th scope="col">Usuario</th>
            <th scope="col">Entidad</th>
            <th scope="col">Actividad</th>
            <th scope="col">Datos</th>
        </thead>
        <tbody>
            @foreach ($results as $item)
            <tr>
                <td>{{ $item->created_at }}</td>
                <td>{{ (!is_null($item->usuario)) ? $item->usuario->usuario : 'sistema' }}</td>
                <td>{{ $item->subject_type }}</td>
                <td>{{ $item->description }}</td>
                <td> {{ $item->properties->toJson(JSON_PRETTY_PRINT) }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
