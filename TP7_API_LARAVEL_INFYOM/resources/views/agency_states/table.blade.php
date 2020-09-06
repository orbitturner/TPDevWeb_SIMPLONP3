<div class="table-responsive">
    <table class="table" id="agencyStates-table">
        <thead>
            <tr>
                <th>State Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($agencyStates as $agencyState)
            <tr>
                <td>{{ $agencyState->state_id }}</td>
                <td>
                    {!! Form::open(['route' => ['agencyStates.destroy', $agencyState->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('agencyStates.show', [$agencyState->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('agencyStates.edit', [$agencyState->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
