<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Pangkat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pangkat', 'Pangkat:') !!}
    {!! Form::text('pangkat', null, ['class' => 'form-control']) !!}
</div>

<!-- Jabatan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jabatan', 'Jabatan:') !!}
    {!! Form::text('jabatan', null, ['class' => 'form-control']) !!}
</div>

<!-- Maksud Perjalanan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('maksud_perjalanan', 'Maksud Perjalanan:') !!}
    {!! Form::text('maksud_perjalanan', null, ['class' => 'form-control']) !!}
</div>

<!-- Kendaraan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kendaraan', 'Kendaraan:') !!}
    {!! Form::text('kendaraan', null, ['class' => 'form-control']) !!}
</div>

<!-- Tempat Berangkat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tempat_berangkat', 'Tempat Berangkat:') !!}
    {!! Form::text('tempat_berangkat', null, ['class' => 'form-control']) !!}
</div>

<!-- Tempat Tujuan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tempat_tujuan', 'Tempat Tujuan:') !!}
    {!! Form::text('tempat_tujuan', null, ['class' => 'form-control']) !!}
</div>

<!-- Lama Perjalanan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lama_perjalanan', 'Lama Perjalanan:') !!}
    {!! Form::text('lama_perjalanan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('perjalananDinas.index') !!}" class="btn btn-default">Cancel</a>
</div>
