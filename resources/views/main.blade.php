<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Gesti&oacute;n de Miembros</title>
	{{-- Instanciando estilos y fuentes --}}
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	{!! MaterializeCSS::include_css() !!}
	<link rel="stylesheet" type="text/css" href="custom/css/main.css">
</head>
<body>

	{{-- Header --}}
	<header>
		<nav>
			<div class="nav-wrapper teal lighten-2">
				<a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
				<a href="#" class="brand-logo center">CAE</a>
			</div>
		</nav>
		<ul id="slide-out" class="side-nav fixed">
			<li>
				<div class="valign-wrapper grey lighten-2">
					<i class="material-icons medium teal-text text-lighten-2 left valign">account_circle</i>
					<p class="black-text valign">Hector Canario </p>
				</div>
			</li>
			<ul class="collapsible" data-collapsible="expandable">
				<li><a class="waves-effect">Home <i class="material-icons teal-text text-lighten-2">home</i></a></li>
				<li class="">
					<div class="collapsible-header active">
						<i class="material-icons teal-text text-lighten-2">keyboard_arrow_down</i>
						Miembros
					</div>
					<div class="collapsible-body no-padding">
						<a class="waves-effect waves-ripple thin">Agregar miembro</a>
						<a class="waves-effect">LIsta de miembros</a>
					</div>
				</li>
				<li>
					<div class="collapsible-header ">
						<i class="material-icons teal-text text-lighten-2">keyboard_arrow_down</i>
						Usuarios
					</div>
					<div class="collapsible-body no-padding">
						<a class="waves-effect">Agregar usuario</a>
						<a class="waves-effect">LIsta de usuarios</a>
					</div>
				</li>
				<li>
					<div class="collapsible-header ">
						<i class="material-icons teal-text text-lighten-2">keyboard_arrow_down</i>
						Administracion
					</div>
					<div class="collapsible-body no-padding">
						<a class="waves-effect">Delegaciones</a>
						<a class="waves-effect">Pagos</a>
						<a class="waves-effect">Reportes</a>
					</div>
				</li>
				<li><div class="divider"></div></li>
				<li><a href="#" class="waves-effect">Cerrar Sesi&oacute;n <i class="material-icons teal-text text-lighten-2">power_settings_new</i></a></li>
				<li><a href="#" class="waves-effect">Ajustes <i class="material-icons teal-text text-lighten-2">settings</i></a></li>
				<li><a href="#" class="waves-effect">Ayuda <i class="material-icons teal-text text-lighten-2">live_help</i></a></li>
			</ul>
		</ul>
	</header>
	{{-- /Header --}}

	{{-- Main --}}
	<main>
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
</script>

</body>
</html>
