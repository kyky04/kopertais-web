@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Perjalanan Dinas
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($perjalananDinas, ['route' => ['perjalananDinas.update', $perjalananDinas->id], 'method' => 'patch']) !!}

                        @include('perjalanan_dinas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection