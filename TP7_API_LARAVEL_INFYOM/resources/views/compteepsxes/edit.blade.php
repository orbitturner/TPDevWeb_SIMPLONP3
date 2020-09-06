@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Compteepsx
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($compteepsx, ['route' => ['compteepsxes.update', $compteepsx->id], 'method' => 'patch']) !!}

                        @include('compteepsxes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection