<!-- Id Provinsi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_provinsi', 'Id Provinsi:') !!}
    {!! Form::text('id_provinsi', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('kotas.index') !!}" class="btn btn-default">Cancel</a>
</div>
