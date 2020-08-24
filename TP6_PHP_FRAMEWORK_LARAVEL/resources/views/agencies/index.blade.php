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
                <h4 class="mt-5 mb-5">Agencies</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('agencies.agency.create') }}" class="btn btn-success" title="Create New Agency">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($agencies) == 0)
            <div class="panel-body text-center">
                <h4>No Agencies Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Creation Date</th>
                            <th>Lieu</th>
                            <th>Num Agency</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($agencies as $agency)
                        <tr>
                            <td>{{ $agency->nom }}</td>
                            <td>{{ $agency->creationDate }}</td>
                            <td>{{ $agency->lieu }}</td>
                            <td>{{ $agency->numAgency }}</td>

                            <td>

                                <form method="POST" action="{!! route('agencies.agency.destroy', $agency->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('agencies.agency.show', $agency->id ) }}" class="btn btn-info" title="Show Agency">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('agencies.agency.edit', $agency->id ) }}" class="btn btn-primary" title="Edit Agency">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Agency" onclick="return confirm(&quot;Click Ok to delete Agency.&quot;)">
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
            {!! $agencies->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection