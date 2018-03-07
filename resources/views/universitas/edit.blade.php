@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Universitas
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($universitas, ['route' => ['universitas.update', $universitas->id], 'method' => 'patch']) !!}

                        @include('universitas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection