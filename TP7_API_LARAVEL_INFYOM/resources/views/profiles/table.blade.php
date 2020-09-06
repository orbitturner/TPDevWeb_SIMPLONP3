<div class="table-responsive">
    <table class="table" id="profiles-table">
        <thead>
            <tr>
                <th>Nom</th>
        <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($profiles as $profile)
            <tr>
                <td>{{ $profile->nom }}</td>
            <td>{{ $profile->description }}</td>
                <td>
                    {!! Form::open(['route' => ['profiles.destroy', $profile->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('profiles.show', [$profile->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('profiles.edit', [$profile->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
