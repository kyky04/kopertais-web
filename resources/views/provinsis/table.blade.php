<table class="table table-responsive" id="provinsis-table">
    <thead>
        <th>Nama</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($provinsis as $provinsi)
        <tr>
            <td>{!! $provinsi->nama !!}</td>
            <td>
                {!! Form::open(['route' => ['provinsis.destroy', $provinsi->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('provinsis.show', [$provinsi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('provinsis.edit', [$provinsi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>