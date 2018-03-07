<!-- Id Kota Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_kota', 'Id Kota:') !!}
    {!! Form::text('id_kota', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::text('alamat', null, ['class' => 'form-control']) !!}
</div>

<!-- Latidude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('latidude', 'Latidude:') !!}
    {!! Form::text('latidude', null, ['class' => 'form-control']) !!}
</div>

<!-- Longitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('longitude', 'Longitude:') !!}
    {!! Form::text('longitude', null, ['class' => 'form-control']) !!}
</div>

<!-- Jarak Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jarak', 'Jarak:') !!}
    {!! Form::text('jarak', null, ['class' => 'form-control']) !!}
</div>

<!-- Biaya Inap Field -->
<div class="form-group col-sm-6">
    {!! Form::label('biaya_inap', 'Biaya Inap:') !!}
    {!! Form::text('biaya_inap', null, ['class' => 'form-control']) !!}
</div>

<!-- Biaya Konsumsi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('biaya_konsumsi', 'Biaya Konsumsi:') !!}
    {!! Form::text('biaya_konsumsi', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('universitas.index') !!}" class="btn btn-default">Cancel</a>
</div>
