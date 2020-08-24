@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Compteepsxes</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('compteepsxes.compteepsx.create') }}" class="btn btn-success" title="Create New Compteepsx">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($compteepsxes) == 0)
            <div class="panel-body text-center">
                <h4>No Compteepsxes Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Owner</th>
                            <th>Account Number</th>
                            <th>Cle R I B</th>
                            <th>Solde</th>
                            <th>Date Creation</th>
                            <th>Active Date</th>
                            <th>Next Remun Date</th>
                            <th>Close Date</th>
                            <th>Id User</th>
                            <th>Host Agency</th>
                            <th>Id Opening Fees</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($compteepsxes as $compteepsx)
                        <tr>
                            <td>{{ optional($compteepsx->Clientphysique)->numId }}</td>
                            <td>{{ $compteepsx->accountNumber }}</td>
                            <td>{{ $compteepsx->cleRIB }}</td>
                            <td>{{ $compteepsx->solde }}</td>
                            <td>{{ $compteepsx->dateCreation }}</td>
                            <td>{{ $compteepsx->activeDate }}</td>
                            <td>{{ $compteepsx->nextRemunDate }}</td>
                            <td>{{ $compteepsx->closeDate }}</td>
                            <td>{{ optional($compteepsx->User)->id }}</td>
                            <td>{{ optional($compteepsx->Agency)->id }}</td>
                            <td>{{ optional($compteepsx->Openingfee)->id }}</td>

                            <td>

                                <form method="POST" action="{!! route('compteepsxes.compteepsx.destroy', $compteepsx->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('compteepsxes.compteepsx.show', $compteepsx->id ) }}" class="btn btn-info" title="Show Compteepsx">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('compteepsxes.compteepsx.edit', $compteepsx->id ) }}" class="btn btn-primary" title="Edit Compteepsx">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Compteepsx" onclick="return confirm(&quot;Click Ok to delete Compteepsx.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $compteepsxes->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection