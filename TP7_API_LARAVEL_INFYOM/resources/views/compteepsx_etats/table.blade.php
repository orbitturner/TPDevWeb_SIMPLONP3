<div class="table-responsive">
    <table class="table" id="compteepsxEtats-table">
        <thead>
            <tr>
                <th>State Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($compteepsxEtats as $compteepsxEtat)
            <tr>
                <td>{{ $compteepsxEtat->state_id }}</td>
                <td>
                    {!! Form::open(['route' => ['compteepsxEtats.destroy', $compteepsxEtat->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('compteepsxEtats.show', [$compteepsxEtat->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('compteepsxEtats.edit', [$compteepsxEtat->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
