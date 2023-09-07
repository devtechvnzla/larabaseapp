<table class="table table-bordered table-sm">
    <thead class="thead">
        <tr class="text-center">
            <td>#

            </td>
            <th>Código

            </th>
            <th>Nombre completo

            </th>
            <th>Usuario

            </th>
            <th>Email

            </th>
            <th>Status

            </th>
            <th>Empresa

            </th>
            <th>Role

            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $row)
        <tr class="text-center">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $row->dpi }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->username }}</td>
            <td>{{ $row->email }}</td>
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
            <td>{{ $row->empresa->razon_social }}</td>
            <td>{{ $row->role->name}}</td>

        @endforeach
    </tbody>
</table>
