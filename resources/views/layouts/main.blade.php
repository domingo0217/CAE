<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CAE | @yield('title')</title>
	{{-- Instanciando estilos y fuentes --}}
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	{{-- {!! MaterializeCSS::include_css() !!} --}}
	<link rel="stylesheet" href="materialize-css/css/materialize.css">
	<link rel="stylesheet" type="text/css" href="custom/css/main.css">
</head>
<body class="grey lighten-3">

	{{-- Header --}}
	 {{-- <header>
		<nav>
			<div class="nav-wrapper teal lighten-2 valign-wrapper">
				<a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
				<a href="#" class="brand-logo valign">@yield('title')</a>
			</div>
		</nav>

	</header> --}}
	{{-- /Header --}}

	{{-- Header2 --}}
	<header>
		<nav class="nav-top red lighten-1 z-depth-0">
			<div class="container">
				<div class="nav-wrapper">
					<a href="#" class="brand-logo">@yield('title')</a>
				</div>
			</div>
		</nav>
		<div class="container"><a href="#" data-activates="nav-mobile" class="button-collapse hide-on-large-only"><i class="material-icons">menu</i></a></div>
		<ul id="nav-mobile" class="side-nav fixed">
			<li><a class="bold">Hector Canario</a></li>
			<li class="no-padding">
				<ul class="collapsible" data-collapsible="accordion">
					<li>
						<a class="collapsible-header waves-effect waves-red bold">Miembros<i class="material-icons">arrow_drop_down</i></a>
						<div class="collapsible-body">
							<ul>
								<li><a href="#" class="waves-effect waves-yellow center">Agregar Miembro</a></li>
								<li><a href="#" class="waves-effect waves-yellow center">Lista de Miembros</a></li>
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
								<li><a href="{{ url("/listado_roles") }}" class="waves-effect waves-yellow center"> Listado de Roles</a></li>

								<li><a href="{{ url("/form_nuevo_permiso ") }}" class="waves-effect waves-yellow center">Agregar Permisos</a></li>
								<li><a href="{{ url("/listado_permisos") }}" class="waves-effect waves-yellow center"> Listado de Permisos</a></li>
								
							
							</ul>
							</li>
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
								<li><a href="#" class="waves-effect waves-yellow center">Pagos</a></li>
								<li><a href="#" class="waves-effect waves-yellow center">Delegaciones</a></li>
								<li><a href="#" class="waves-effect waves-yellow center">Reportes</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</li>
			<li class="divider"></li>
			<li><a href="{{URL('logout')}}" class="waves-effect waves-red bold">Cerrar sesi&oacute;n</a></li>
			<li><a href="#" class="waves-effect waves-red bold">Ajustes</a></li>
			<li><a href="#" class="waves-effect waves-red bold">Ayuda</a></li>
		</ul>
    </header>
	{{-- /Header2 --}}

	{{-- Main --}}
	<main class="container">
		@yield('content')
	</main>
	{{-- /Main --}}

{{-- instanciando javascript --}}
<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
{!! MaterializeCSS::include_js() !!}

{{-- Inicializando funciones de materilize --}}
<script type="text/javascript">
	// Initialize collapse button
	$(".button-collapse").sideNav();
	// Initialize collapsible (uncomment the line below if you use the dropdown variation)
	$('.collapsible').collapsible();
	//Initialize datepicker
	$('.datepicker').pickadate({
	    selectMonths: true, // Creates a dropdown to control month
	    selectYears: 200 // Creates a dropdown of 15 years to control year
	});
	//Initialize select
	$('select').material_select();
</script>

</body>
</html>
