<table class="table table-responsive" id="perjalanans-table">
    <thead>
        <th>Id Universitas</th>
        <th>Waktu</th>
        <th>Status Keuangan</th>
        <th>Status Bendahara</th>
        <th>Nama</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($perjalanans as $perjalanan)
        <tr>
            <td>{!! $perjalanan->id_universitas !!}</td>
            <td>{!! $perjalanan->waktu !!}</td>
            <td>{!! $perjalanan->status_keuangan !!}</td>
            <td>{!! $perjalanan->status_bendahara !!}</td>
            <td>{!! $perjalanan->nama !!}</td>
            <td>
                {!! Form::open(['route' => ['perjalanans.destroy', $perjalanan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('perjalanans.show', [$perjalanan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('perjalanans.edit', [$perjalanan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>