<!-- Tanggal Berangkat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_berangkat', 'Tanggal Berangkat:') !!}
    {!! Form::date('tanggal_berangkat', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Kembali Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_kembali', 'Tanggal Kembali:') !!}
    {!! Form::date('tanggal_kembali', null, ['class' => 'form-control']) !!}
</div>

<!-- Lama Pejalanan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lama_pejalanan', 'Lama Pejalanan:') !!}
    {!! Form::text('lama_pejalanan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('rekomendasis.index') !!}" class="btn btn-default">Cancel</a>
</div>
