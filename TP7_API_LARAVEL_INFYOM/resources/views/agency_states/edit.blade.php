@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Agency State
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($agencyState, ['route' => ['agencyStates.update', $agencyState->id], 'method' => 'patch']) !!}

                        @include('agency_states.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection