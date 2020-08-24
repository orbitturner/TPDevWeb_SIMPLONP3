@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Compteepsx Etat' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('compteepsx_etats.compteepsx_etat.destroy', $compteepsxEtat->compteepsx_id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('compteepsx_etats.compteepsx_etat.index') }}" class="btn btn-primary" title="Show All Compteepsx Etat">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('compteepsx_etats.compteepsx_etat.create') }}" class="btn btn-success" title="Create New Compteepsx Etat">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('compteepsx_etats.compteepsx_etat.edit', $compteepsxEtat->compteepsx_id ) }}" class="btn btn-primary" title="Edit Compteepsx Etat">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Compteepsx Etat" onclick="return confirm(&quot;Click Ok to delete Compteepsx Etat.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>State</dt>
            <dd>{{ optional($compteepsxEtat->State)->id }}</dd>

        </dl>

    </div>
</div>

@endsection