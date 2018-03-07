<table class="table table-responsive" id="kotas-table">
    <thead>
        <th>Id Provinsi</th>
        <th>Nama</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($kotas as $kota)
        <tr>
            <td>{!! $kota->id_provinsi !!}</td>
            <td>{!! $kota->nama !!}</td>
            <td>
                {!! Form::open(['route' => ['kotas.destroy', $kota->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('kotas.show', [$kota->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('kotas.edit', [$kota->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>