<ul id="nav-mobile" class="side-nav fixed">
    <li><a class="bold">{{ Auth::user()->name }} {{ Auth::user()->lastname  }}</a></li>
    <li class="divider"></li>
    <li><a href="/dashboard" class="waves-effect waves-red bold"><i class="material-icons">dashboard</i>Dashboard</a></li>
    <li class="no-padding">
        <ul class="collapsible" data-collapsible="accordion">
            <li>
                <a class="collapsible-header waves-effect waves-red bold">Miembros<i class="material-icons">arrow_drop_down</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="/member/create" class="waves-effect waves-yellow center">Agregar Miembro</a></li>
                        <li><a href="/member" class="waves-effect waves-yellow center">Lista de Miembros</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </li>
    <li class="no-padding">
        <ul class="collapsible " data-collapsible="accordion">
            <li>
                <a class="collapsible-header waves-effect waves-red bold">Usuarios 	<i class="material-icons">arrow_drop_down</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="{{ url("/form_nuevo_usuario") }}" class="waves-effect waves-yellow center">Agregar Usuario</a></li>
                       <li><a href="{{ url("/listado_usuarios") }}" class="waves-effect waves-yellow center">Lista de Usuarios</a></li>
                                <li class="no-padding">

                                <li><a href="{{ url("/form_nuevo_rol") }}" class="waves-effect waves-yellow center"> Agregar Roles</a></li>
                                <li><a href="{{ url("/listado_roles") }}" class="waves-effect waves-yellow center"> Lista de Roles</a></li>

                                <li><a href="{{ url("/form_nuevo_permiso ") }}" class="waves-effect waves-yellow center">Agregar Permisos</a></li>
                                <li><a href="{{ url("/listado_permisos") }}" class="waves-effect waves-yellow center"> Lista de Permisos</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </li>
    <li class="no-padding">
        <ul class="collapsible" data-collapsible="accordion">
            <li>
                <a class="collapsible-header waves-effect waves-red bold">Administraci&oacute;n 	<i class="material-icons">arrow_drop_down</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="/assembly" class="waves-effect waves-yellow center">Asamblea</a></li>
                        <li><a href="/capacitation" class="waves-effect waves-yellow center">Capacitaciones</a></li>
                        <li><a href="/charge" class="waves-effect waves-yellow center">Cargos</a></li>
                        <li><a href="/city" class="waves-effect waves-yellow center">Ciudades</a></li>
                        <li><a href="/delegation" class="waves-effect waves-yellow center">Delegaciones</a></li>
                        <li><a href="/document" class="waves-effect waves-yellow center">Documentos</a></li>
                    

                    </ul>
                </div>
            </li>
        </ul>
    </li>
    <li class="no-padding">
        <ul class="collapsible " data-collapsible="accordion">
            <li>
                <a class="collapsible-header waves-effect waves-red bold">Reportes  <i class="material-icons">arrow_drop_down</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="{{ url("/crear_reporte_por_miembros_activos/1") }}" class="waves-effect waves-yellow center">Miembros activos</a></li>
                        <li><a href="{{ url("/crear_reporte_por_miembros_pasivos/1") }}" class="waves-effect waves-yellow center">Miembros pasivos</a></li>
                        <li><a href="{{ url("/crear_reporte_por_todos/1") }}" class="waves-effect waves-yellow center">Todos los miembros</a></li>
                        {{-- <li><a href="{{ url("/crear_reporte_por_miembros_delegacion/1") }}" class="waves-effect waves-yellow center">Miembros por delegacion</a></li>

<li><a href="{{ url("/crear_reporte_capacitacion_miembro/1") }}" class="waves-effect waves-yellow center">Capacitaciones por miembros</a></li> --}}
                    </ul>
                </div>
            </li>
        </ul>
    </li>
     <li class="divider"></li>
    <li><a href="#" class="waves-effect waves-red bold"><i class="material-icons">live_help</i>Ayuda</a></li>
    <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();" class="waves-effect waves-red bold"><i class="material-icons">power_settings_new</i>Cerrar sesi&oacute;n</a></li>
</ul>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                       </li>
