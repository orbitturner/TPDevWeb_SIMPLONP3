<div class="table-responsive">
    <table class="table" id="clientphysiques-table">
        <thead>
            <tr>
                <th>Numid</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Cni</th>
        <th>Telephone</th>
        <th>Adresse</th>
        <th>Sexe</th>
        <th>Datenaiss</th>
        <th>Datecreation</th>
        <th>Features</th>
        <th>Issalarie</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clientphysiques as $clientphysique)
            <tr>
                <td>{{ $clientphysique->numId }}</td>
            <td>{{ $clientphysique->nom }}</td>
            <td>{{ $clientphysique->prenom }}</td>
            <td>{{ $clientphysique->email }}</td>
            <td>{{ $clientphysique->cni }}</td>
            <td>{{ $clientphysique->telephone }}</td>
            <td>{{ $clientphysique->adresse }}</td>
            <td>{{ $clientphysique->sexe }}</td>
            <td>{{ $clientphysique->dateNaiss }}</td>
            <td>{{ $clientphysique->dateCreation }}</td>
            <td>{{ $clientphysique->features }}</td>
            <td>{{ $clientphysique->isSalarie }}</td>
                <td>
                    {!! Form::open(['route' => ['clientphysiques.destroy', $clientphysique->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('clientphysiques.show', [$clientphysique->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('clientphysiques.edit', [$clientphysique->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
