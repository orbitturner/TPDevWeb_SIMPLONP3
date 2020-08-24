@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Compteepsx' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('compteepsxes.compteepsx.destroy', $compteepsx->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('compteepsxes.compteepsx.index') }}" class="btn btn-primary" title="Show All Compteepsx">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('compteepsxes.compteepsx.create') }}" class="btn btn-success" title="Create New Compteepsx">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('compteepsxes.compteepsx.edit', $compteepsx->id ) }}" class="btn btn-primary" title="Edit Compteepsx">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Compteepsx" onclick="return confirm(&quot;Click Ok to delete Compteepsx.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Owner</dt>
            <dd>{{ optional($compteepsx->Clientphysique)->numId }}</dd>
            <dt>Account Number</dt>
            <dd>{{ $compteepsx->accountNumber }}</dd>
            <dt>Cle R I B</dt>
            <dd>{{ $compteepsx->cleRIB }}</dd>
            <dt>Solde</dt>
            <dd>{{ $compteepsx->solde }}</dd>
            <dt>Date Creation</dt>
            <dd>{{ $compteepsx->dateCreation }}</dd>
            <dt>Active Date</dt>
            <dd>{{ $compteepsx->activeDate }}</dd>
            <dt>Next Remun Date</dt>
            <dd>{{ $compteepsx->nextRemunDate }}</dd>
            <dt>Close Date</dt>
            <dd>{{ $compteepsx->closeDate }}</dd>
            <dt>Id User</dt>
            <dd>{{ optional($compteepsx->User)->id }}</dd>
            <dt>Host Agency</dt>
            <dd>{{ optional($compteepsx->Agency)->id }}</dd>
            <dt>Id Opening Fees</dt>
            <dd>{{ optional($compteepsx->Openingfee)->id }}</dd>

        </dl>

    </div>
</div>

@endsection