<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Program</th>
        </tr>
    </thead>
    <tbody>
    @foreach($prexc_activities as $pa)
        <tr>
            <td>{{ $pa->id }}</td>
            <td>{{ $pa->prexc_program ? $pa->prexc_program->name : null }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
