@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'State' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('states.state.destroy', $state->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('states.state.index') }}" class="btn btn-primary" title="Show All State">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('states.state.create') }}" class="btn btn-success" title="Create New State">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('states.state.edit', $state->id ) }}" class="btn btn-primary" title="Edit State">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete State" onclick="return confirm(&quot;Click Ok to delete State.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Nom</dt>
            <dd>{{ $state->nom }}</dd>
            <dt>Description</dt>
            <dd>{{ $state->description }}</dd>

        </dl>

    </div>
</div>

@endsection