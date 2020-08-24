@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Openingfee' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('openingfees.openingfee.destroy', $openingfee->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('openingfees.openingfee.index') }}" class="btn btn-primary" title="Show All Openingfee">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('openingfees.openingfee.create') }}" class="btn btn-success" title="Create New Openingfee">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('openingfees.openingfee.edit', $openingfee->id ) }}" class="btn btn-primary" title="Edit Openingfee">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Openingfee" onclick="return confirm(&quot;Click Ok to delete Openingfee.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Libelle</dt>
            <dd>{{ $openingfee->libelle }}</dd>
            <dt>Montant</dt>
            <dd>{{ $openingfee->montant }}</dd>

        </dl>

    </div>
</div>

@endsection