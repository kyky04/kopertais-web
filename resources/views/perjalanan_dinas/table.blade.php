<table class="table table-responsive" id="perjalananDinas-table">
    <thead>
        <th>Nama</th>
        <th>Pangkat</th>
        <th>Jabatan</th>
        <th>Maksud Perjalanan</th>
        <th>Kendaraan</th>
        <th>Tempat Berangkat</th>
        <th>Tempat Tujuan</th>
        <th>Lama Perjalanan</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($perjalananDinas as $perjalananDinas)
        <tr>
            <td>{!! $perjalananDinas->nama !!}</td>
            <td>{!! $perjalananDinas->pangkat !!}</td>
            <td>{!! $perjalananDinas->jabatan !!}</td>
            <td>{!! $perjalananDinas->maksud_perjalanan !!}</td>
            <td>{!! $perjalananDinas->kendaraan !!}</td>
            <td>{!! $perjalananDinas->tempat_berangkat !!}</td>
            <td>{!! $perjalananDinas->tempat_tujuan !!}</td>
            <td>{!! $perjalananDinas->lama_perjalanan !!}</td>
            <td>
                {!! Form::open(['route' => ['perjalananDinas.destroy', $perjalananDinas->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('perjalananDinas.show', [$perjalananDinas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('perjalananDinas.edit', [$perjalananDinas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>