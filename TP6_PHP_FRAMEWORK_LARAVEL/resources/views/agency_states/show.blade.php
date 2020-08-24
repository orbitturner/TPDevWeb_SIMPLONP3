@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Agency State' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('agency_states.agency_state.destroy', $agencyState->agency_id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('agency_states.agency_state.index') }}" class="btn btn-primary" title="Show All Agency State">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('agency_states.agency_state.create') }}" class="btn btn-success" title="Create New Agency State">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('agency_states.agency_state.edit', $agencyState->agency_id ) }}" class="btn btn-primary" title="Edit Agency State">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Agency State" onclick="return confirm(&quot;Click Ok to delete Agency State.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>State</dt>
            <dd>{{ optional($agencyState->State)->id }}</dd>

        </dl>

    </div>
</div>

@endsection