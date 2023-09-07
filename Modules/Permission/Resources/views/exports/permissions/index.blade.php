<table class="table table-bordered table-sm">
    <thead class="thead">
        <tr class="text-center">

            <td>#

            </td>
            <th>Title

            </th>
            <th>Descripción

            </th>
            <th>Módulo

            </th>
            <th>Estado del permiso

            </th>

        </tr>
    </thead>
    <tbody>
        @foreach($permissions as $row)
        <tr class="text-center">

            <td>{{ $loop->iteration }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->descripcion }}</td>
            <td>{{ $row->slug }}</td>
            <td>

                    @if ($row->status == 1)
                        <span class="badge bg-success">
                            ACTIVO
                        </span>

                     @else
                        <span class="badge bg-danger">
                            INACTIVO
                        </span>
                    @endif


            </td>

        </tr>
        @endforeach
    </tbody>
</table>
