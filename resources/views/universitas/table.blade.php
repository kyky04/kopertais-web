<table class="table table-responsive" id="universitas-table">
    <thead>
        <th>Id Kota</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Latidude</th>
        <th>Longitude</th>
        <th>Jarak</th>
        <th>Biaya Inap</th>
        <th>Biaya Konsumsi</th>
        
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($universitas as $universitas)
        <tr>
            <td>{!! $universitas->id_kota !!}</td>
            <td>{!! $universitas->nama !!}</td>
            <td>{!! $universitas->alamat !!}</td>
            <td>{!! $universitas->latidude !!}</td>
            <td>{!! $universitas->longitude !!}</td>
            <td>{!! $universitas->jarak !!}</td>
            <td>{!! $universitas->biaya_inap !!}</td>
            <td>{!! $universitas->biaya_konsumsi !!}</td>
            <td>
                {!! Form::open(['route' => ['universitas.destroy', $universitas->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('universitas.show', [$universitas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('universitas.edit', [$universitas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>