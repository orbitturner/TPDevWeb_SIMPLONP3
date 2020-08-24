@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Agency' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('agencies.agency.destroy', $agency->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('agencies.agency.index') }}" class="btn btn-primary" title="Show All Agency">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('agencies.agency.create') }}" class="btn btn-success" title="Create New Agency">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('agencies.agency.edit', $agency->id ) }}" class="btn btn-primary" title="Edit Agency">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Agency" onclick="return confirm(&quot;Click Ok to delete Agency.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Nom</dt>
            <dd>{{ $agency->nom }}</dd>
            <dt>Creation Date</dt>
            <dd>{{ $agency->creationDate }}</dd>
            <dt>Lieu</dt>
            <dd>{{ $agency->lieu }}</dd>
            <dt>Num Agency</dt>
            <dd>{{ $agency->numAgency }}</dd>

        </dl>

    </div>
</div>

@endsection