<table class="table table-bordered table-sm">
    <thead class="thead">
        <tr class="text-center">
            <td>#</td>
            <th>Razon Social</th>
            <th>Documento</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Email</th>
            <th>Is Active</th>
        </tr>
    </thead>
    <tbody>
        @foreach($empresas as $row)
        <tr class="text-center">
            <td>{{ $loop->iteration }}</td>
            <td>
                @if(strlen($row->razon_social) > 12)
                    {{ substr($row->razon_social, 0, 12) . "..."}}
                @else
                    {{ $row->razon_social }}
                @endif
            </td>
            <td>{{ $row->documento }}</td>
            <td>{{ $row->telefono }}</td>
            <td>
                {{ $row->direccion }}
            </td>
            <td>{{ $row->email }}</td>
            <td>
                @if ($row->is_active == 1)
                    <span class="badge bg-success">ACTIVO</span>
                @else
                    <span class="badge bg-danger">INACTIVO</span>

                @endif
            </td>
        @endforeach
    </tbody>
</table>
