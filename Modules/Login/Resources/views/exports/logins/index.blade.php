<table class="table table-hover table-sm">
    <thead class="thead">
        <tr class="text-center">
            <td>#</td>
            <th>Usuario</th>
            <th>Agente</th>
            <th>Mes</th>
            <th>Dirección IP</th>
            <th>Login</th>
            <th>Logout</th>

            <th>Ciudad</th>
        </tr>
    </thead>
    <tbody>
        @foreach($logins as $row)
        <tr class="text-center">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $row->user->name }}</td>
            <td>
                {{ $row->user_agent }}
            </td>
            <td>
                @if(strlen($row->mes) > 12)
                    {{ substr($row->mes, 0, 12) . "..."}}
                @else
                    {{ $row->mes }}
                @endif
            </td>
            <td>{{ $row->ip_address }}</td>
            <td>{{ $row->login_at }}</td>
            <td>{{ $row->logout_at }}</td>

            <td>{{ $row->ciudad }}</td>

        @endforeach
    </tbody>
</table>
