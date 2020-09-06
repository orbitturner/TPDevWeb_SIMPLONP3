@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Clientphysique
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($clientphysique, ['route' => ['clientphysiques.update', $clientphysique->id], 'method' => 'patch']) !!}

                        @include('clientphysiques.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection