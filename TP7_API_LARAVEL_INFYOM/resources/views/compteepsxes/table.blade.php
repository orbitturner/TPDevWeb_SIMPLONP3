<div class="table-responsive">
    <table class="table" id="compteepsxes-table">
        <thead>
            <tr>
                <th>Owner Id</th>
        <th>Accountnumber</th>
        <th>Clerib</th>
        <th>Solde</th>
        <th>Datecreation</th>
        <th>Activedate</th>
        <th>Nextremundate</th>
        <th>Closedate</th>
        <th>Iduser</th>
        <th>Hostagency</th>
        <th>Idopeningfees</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($compteepsxes as $compteepsx)
            <tr>
                <td>{{ $compteepsx->owner_id }}</td>
            <td>{{ $compteepsx->accountNumber }}</td>
            <td>{{ $compteepsx->cleRIB }}</td>
            <td>{{ $compteepsx->solde }}</td>
            <td>{{ $compteepsx->dateCreation }}</td>
            <td>{{ $compteepsx->activeDate }}</td>
            <td>{{ $compteepsx->nextRemunDate }}</td>
            <td>{{ $compteepsx->closeDate }}</td>
            <td>{{ $compteepsx->idUser }}</td>
            <td>{{ $compteepsx->hostAgency }}</td>
            <td>{{ $compteepsx->idOpeningFees }}</td>
                <td>
                    {!! Form::open(['route' => ['compteepsxes.destroy', $compteepsx->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('compteepsxes.show', [$compteepsx->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('compteepsxes.edit', [$compteepsx->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
