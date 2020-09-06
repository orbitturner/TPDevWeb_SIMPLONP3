@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Compteepsx Etat
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($compteepsxEtat, ['route' => ['compteepsxEtats.update', $compteepsxEtat->id], 'method' => 'patch']) !!}

                        @include('compteepsx_etats.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection