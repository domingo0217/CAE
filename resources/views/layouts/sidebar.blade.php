<ul id="nav-mobile" class="side-nav fixed">
    <li><a class="bold">Hector Canario</a></li>
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
                        <li><a href="#" class="waves-effect waves-yellow center">Asamblea</a></li>
                        <li><a href="/capacitation" class="waves-effect waves-yellow center">Capacitaciones</a></li>
                        <li><a href="/charge" class="waves-effect waves-yellow center">Cargos</a></li>
                        <li><a href="/city" class="waves-effect waves-yellow center">Ciudades</a></li>
                        <li><a href="/delegation" class="waves-effect waves-yellow center">Delegaciones</a></li>
                        <li><a href="#" class="waves-effect waves-yellow center">Pagos</a></li>
                        <li><a href="#" class="waves-effect waves-yellow center">Reportes</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </li>
     <li class="divider"></li>
     <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();" class="waves-effect waves-red bold"><i class="material-icons">power_settings_new</i>Cerrar sesi&oacute;n</a></li>
    <li><a href="#" class="waves-effect waves-red bold"><i class="material-icons">settings</i>Ajustes</a></li>
    <li><a href="#" class="waves-effect waves-red bold"><i class="material-icons">live_help</i>Ayuda</a></li>
</ul>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                       </li>

