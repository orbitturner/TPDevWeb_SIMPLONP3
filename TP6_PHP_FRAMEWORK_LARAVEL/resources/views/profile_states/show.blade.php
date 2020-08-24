@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Profile State' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('profile_states.profile_state.destroy', $profileState->profile_id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('profile_states.profile_state.index') }}" class="btn btn-primary" title="Show All Profile State">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('profile_states.profile_state.create') }}" class="btn btn-success" title="Create New Profile State">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('profile_states.profile_state.edit', $profileState->profile_id ) }}" class="btn btn-primary" title="Edit Profile State">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Profile State" onclick="return confirm(&quot;Click Ok to delete Profile State.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>State</dt>
            <dd>{{ optional($profileState->State)->id }}</dd>

        </dl>

    </div>
</div>

@endsection