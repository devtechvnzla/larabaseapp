<table class="table table-bordered table-sm">
    <thead class="thead">
        <tr class="text-center">
            <td>#
            </td>
            <th>Código de la agencia
            </th>
            <th>Descripción
            </th>
            <th>Estado de la agencia
            </th>

        </tr>
    </thead>
    <tbody>
        @foreach($agencias as $row)
        <tr class="text-center">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $row->code }}</td>
            <td>{{ $row->name }}</td>
            <td>

            @if ($row->status == 1)
                <span class="badge bg-success">
                    DISPONIBLE
                </span>
            @else
                <span class="badge bg-danger">
                    INACTIVO
                </span>
            @endif

            </td>

        @endforeach
    </tbody>
</table>
