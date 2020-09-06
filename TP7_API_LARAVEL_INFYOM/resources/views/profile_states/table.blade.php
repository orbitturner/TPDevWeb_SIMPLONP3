<div class="table-responsive">
    <table class="table" id="profileStates-table">
        <thead>
            <tr>
                <th>State Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($profileStates as $profileState)
            <tr>
                <td>{{ $profileState->state_id }}</td>
                <td>
                    {!! Form::open(['route' => ['profileStates.destroy', $profileState->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('profileStates.show', [$profileState->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('profileStates.edit', [$profileState->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
