<!-- Id Universitas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_universitas', 'Id Universitas:') !!}
    {!! Form::text('id_universitas', null, ['class' => 'form-control']) !!}
</div>

<!-- Waktu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('waktu', 'Waktu:') !!}
    {!! Form::date('waktu', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Keuangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_keuangan', 'Status Keuangan:') !!}
    {!! Form::number('status_keuangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Bendahara Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_bendahara', 'Status Bendahara:') !!}
    {!! Form::number('status_bendahara', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('perjalanans.index') !!}" class="btn btn-default">Cancel</a>
</div>
