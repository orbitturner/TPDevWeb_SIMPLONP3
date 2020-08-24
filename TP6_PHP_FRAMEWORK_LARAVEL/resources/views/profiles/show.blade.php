@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Profile' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('profiles.profile.destroy', $profile->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('profiles.profile.index') }}" class="btn btn-primary" title="Show All Profile">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('profiles.profile.create') }}" class="btn btn-success" title="Create New Profile">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('profiles.profile.edit', $profile->id ) }}" class="btn btn-primary" title="Edit Profile">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Profile" onclick="return confirm(&quot;Click Ok to delete Profile.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Nom</dt>
            <dd>{{ $profile->nom }}</dd>
            <dt>Description</dt>
            <dd>{{ $profile->description }}</dd>

        </dl>

    </div>
</div>

@endsection