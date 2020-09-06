<div class="table-responsive">
    <table class="table" id="openingfees-table">
        <thead>
            <tr>
                <th>Libelle</th>
        <th>Montant</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($openingfees as $openingfee)
            <tr>
                <td>{{ $openingfee->libelle }}</td>
            <td>{{ $openingfee->montant }}</td>
                <td>
                    {!! Form::open(['route' => ['openingfees.destroy', $openingfee->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('openingfees.show', [$openingfee->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('openingfees.edit', [$openingfee->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
