<li class="{{ Request::is('provinsis*') ? 'active' : '' }}">
    <a href="{!! route('provinsis.index') !!}"><i class="fa fa-edit"></i><span>Provinsis</span></a>
</li>

<li class="{{ Request::is('kotas*') ? 'active' : '' }}">
    <a href="{!! route('kotas.index') !!}"><i class="fa fa-edit"></i><span>Kotas</span></a>
</li>

<li class="{{ Request::is('universitas*') ? 'active' : '' }}">
    <a href="{!! route('universitas.index') !!}"><i class="fa fa-edit"></i><span>Universitas</span></a>
</li>

<li class="{{ Request::is('perjalanans*') ? 'active' : '' }}">
    <a href="{!! route('perjalanans.index') !!}"><i class="fa fa-edit"></i><span>Perjalanans</span></a>
</li>

