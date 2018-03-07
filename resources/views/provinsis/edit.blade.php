@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Provinsi
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($provinsi, ['route' => ['provinsis.update', $provinsi->id], 'method' => 'patch']) !!}

                        @include('provinsis.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection