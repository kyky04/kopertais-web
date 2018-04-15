@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Rekomendasi
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($rekomendasi, ['route' => ['rekomendasis.update', $rekomendasi->id], 'method' => 'patch']) !!}

                        @include('rekomendasis.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection