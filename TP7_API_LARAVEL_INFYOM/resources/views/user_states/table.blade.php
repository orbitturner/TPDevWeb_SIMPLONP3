<div class="table-responsive">
    <table class="table" id="userStates-table">
        <thead>
            <tr>
                <th>State Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($userStates as $userState)
            <tr>
                <td>{{ $userState->state_id }}</td>
                <td>
                    {!! Form::open(['route' => ['userStates.destroy', $userState->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('userStates.show', [$userState->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('userStates.edit', [$userState->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
