<div class="table-responsive">
    <table class="table" id="employees-table">
        <thead>
            <tr>
                <th>Numemployee</th>
        <th>Telephone</th>
        <th>Email</th>
        <th>Cni</th>
        <th>Adresse</th>
        <th>Sexe</th>
        <th>Service</th>
        <th>Datenaiss</th>
        <th>Iduser</th>
        <th>Agencyhost</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->numEmployee }}</td>
            <td>{{ $employee->telephone }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->cni }}</td>
            <td>{{ $employee->adresse }}</td>
            <td>{{ $employee->sexe }}</td>
            <td>{{ $employee->service }}</td>
            <td>{{ $employee->dateNaiss }}</td>
            <td>{{ $employee->idUser }}</td>
            <td>{{ $employee->agencyhost }}</td>
                <td>
                    {!! Form::open(['route' => ['employees.destroy', $employee->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('employees.show', [$employee->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('employees.edit', [$employee->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
