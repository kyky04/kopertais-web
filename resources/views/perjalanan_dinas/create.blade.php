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
                    {!! Form::open(['route' => 'perjalananDinas.store']) !!}

                        @include('perjalanan_dinas.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
