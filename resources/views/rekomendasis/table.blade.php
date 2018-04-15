<table class="table table-responsive" id="rekomendasis-table">
    <thead>
        <th>Id User</th>
        <th>Id Univ</th>
        <th>Tanggal Berangkat</th>
        <th>Tanggal Kembali</th>
        <th>Lama Pejalanan</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($rekomendasis as $rekomendasi)
        <tr>
            <td>{!! $rekomendasi->id_user !!}</td>
            <td>{!! $rekomendasi->id_univ !!}</td>
            <td>{!! $rekomendasi->tanggal_berangkat !!}</td>
            <td>{!! $rekomendasi->tanggal_kembali !!}</td>
            <td>{!! $rekomendasi->lama_pejalanan !!}</td>
            <td>
                {!! Form::open(['route' => ['rekomendasis.destroy', $rekomendasi->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('rekomendasis.show', [$rekomendasi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('rekomendasis.edit', [$rekomendasi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>