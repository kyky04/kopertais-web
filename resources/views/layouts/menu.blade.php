<li class="{{ Request::is('provinsis*') ? 'active' : '' }}">
    <a href="{!! route('provinsis.index') !!}"><i class="fa fa-edit"></i><span>Provinsi</span></a>
</li>

<li class="{{ Request::is('kotas*') ? 'active' : '' }}">
    <a href="{!! route('kotas.index') !!}"><i class="fa fa-edit"></i><span>Kota</span></a>
</li>

<li class="{{ Request::is('universitas*') ? 'active' : '' }}">
    <a href="{!! route('universitas.index') !!}"><i class="fa fa-edit"></i><span>Universitas</span></a>
</li>

<li class="{{ Request::is('perjalanans*') ? 'active' : '' }}">
    <a href="{!! route('perjalanans.index') !!}"><i class="fa fa-edit"></i><span>Perjalanan</span></a>
</li>

<li class="{{ Request::is('pegawais*') ? 'active' : '' }}">
    <a href="{!! route('pegawais.index') !!}"><i class="fa fa-edit"></i><span>Pegawai</span></a>
</li>

<li class="{{ Request::is('rekomendasis*') ? 'active' : '' }}">
    <a href="{!! route('rekomendasis.index') !!}"><i class="fa fa-edit"></i><span>Rekomendasi</span></a>
</li>

<li class="{{ Request::is('perjalananDinas*') ? 'active' : '' }}">
    <a href="{!! route('perjalananDinas.index') !!}"><i class="fa fa-edit"></i><span>PerjalananDinas</span></a>
</li>

