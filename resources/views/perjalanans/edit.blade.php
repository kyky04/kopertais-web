@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Perjalanan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($perjalanan, ['route' => ['perjalanans.update', $perjalanan->id], 'method' => 'patch']) !!}

                        @include('perjalanans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection