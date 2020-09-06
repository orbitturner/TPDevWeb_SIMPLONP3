@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Profile State
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($profileState, ['route' => ['profileStates.update', $profileState->id], 'method' => 'patch']) !!}

                        @include('profile_states.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection