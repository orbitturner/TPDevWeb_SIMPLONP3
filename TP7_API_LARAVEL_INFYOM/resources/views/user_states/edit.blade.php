@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            User State
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($userState, ['route' => ['userStates.update', $userState->id], 'method' => 'patch']) !!}

                        @include('user_states.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection