<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CAE</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	{!! MaterializeCSS::include_css() !!}
	<link rel="stylesheet" type="text/css" href="custom/css/index.css">
	<link rel="shortcut icon" type="image/png" href="img/logo.png"/>
</head>
<body>
	<!-- Header1 -->
	 <header id="first" class="scrollspy">
		<div class="navbar-fixed">
			<nav class="red darken-1">
				<div class="container">
					<div class="nav-wrapper">
						<a class="brand-logo large center hide-on-large-only">CAE</a>
						<a class="brand-logo large hide-on-med-and-down">CAE</a>
						<a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
						<ul class="right hide-on-med-and-down">
							<!-- <li><a href="#first" class=" waves-effect waves-light">Portada</a></li> -->
							<li><a href="#about" class=" waves-effect waves-light">Sobre Nosotros</a></li>
							<li><a href="#footer" class=" waves-effect waves-light">Contactos</a></li>
							<li><a href="/login" class="waves-effect waves-light">Control de Miembros</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<ul class="side-nav" id="slide-out">
			<li><a href="javascript:$('.button-collapse').sideNav('hide');"><i class="material-icons">close</i></a></li>
			<li><a href="#first" class="blue-grey-text waves-effect waves-blue">Portada</a></li>
			<li><a href="#about" class="blue-grey-text waves-effect waves-blue">Sobre Nosotros</a></li>
			<li><a href="#footer" class="blue-grey-text waves-effect waves-blue">Contactos</a></li>
			<div class="divider"></div>
			<li><a href="#modal-IniciaSesion" class="blue-grey-text">Control de Miembros</a></li>
		</ul>
	</header>
	{{-- /Header1 --}}



	<!-- Main -->
	<main>
		<div class="parallax-container">
		    <div class="parallax"><img id="img" src="img/fondo.jpg"></div>
		</div>
		<div class="section white z-depth-5 scrollspy" id="about">
		    <div class="row">
		       	<div class="col s12">
					<ul class="tabs">
						<li class="tab col s4"><a href="#what">¿Qu&eacute es?</a></li>
						<li class="tab col s4"><a href="#us">Sobre Nosotros</a></li>
						<li class="tab col s4"><a href="#mision">Misi&oacute;n</a></li>
					</ul>
				</div>
				<div id="what" class="col s12 m8 l8 offset-m2 offset-l2">
					<div class="section">
						<p class="center-align">1Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
							 aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
							  Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
							  sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
				</div>
				<div id="us" class="col s12 m8 l8 offset-m2 offset-l2">
					<div class="section">
						<p class="center-align">2Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
							 aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
							  Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
							  sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
				</div>
				<div id="mision" class="col s12 m8 l8 offset-m2 offset-l2">
					<div class="section">
						<p class="center-align">3Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
							 aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
							  Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
							  sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
				</div>
		        <div class="col s12 center-align">
		        	<!-- <p class="grey-text text-darken-3">Deseas unirte a nosotros? <a href="#">Haz click aqui.</a></p> -->
					<a class="btn orange accent-3 waves-effect waves-light z-depth-3 hoverable">&uacute;nete a nosotros</a>
		        </div>
		    </div>
		</div>
		<div class="parallax-container">
		    <div class="parallax"><img id="img2" src="img/fondo4.jpg"></div>
		</div>
	</main>

	<!-- Modal iniciar sesion -->
	<div class="modal" id="modal-IniciaSesion">
		<div class="modal-content">
			<div class="row">
				<form action="">
					<div class="col s12 input-field">
						<h4 class="center blue-grey-text">Inicia Sesi&oacute;n</h4>
					</div>
					<div class="col s12 input-field">
						<i class="material-icons prefix">account_circle</i>
						<input type="" name="" class="validate" id="">
						<label for="">Nombre de Usuario</label>
					</div>
					<div class="col s12 input-field">
						<i class="material-icons prefix">lock</i>
						<input type="password" name="" class="validate" id="">
						<label for="">Contraseña</label>
					</div>
					<br>
					<div class="col s12 center-align">
						<a href="contraseña.html">Olvid&eacute; mi contraseña!</a>
					</div>
					<br>
					<br>
					<div class="col s12 ">
						<a class="modal-action modal-close btn-flat waves-effect waves-red right">Cerrar</a>
						<a class="waves-effect waves-green btn-flat right">Entrar</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<footer class="page-footer black scrollspy" id="footer">
		<div class="container">
			<div class="row">
				<div class="col l6 s12">
                	<h4 class="white-text">Contactos</h4>
                	<p class="grey-text text-lighten-4">Escribenos a:</p>
					<a href="#" class="yellow-text text-accent-4">cae@info.org.do</a>
              	</div>
              	<div class="col l4 offset-l2 s12">
                	<h4 class="white-text ">Redes Sociales</h4>
	                <ul class="center-align">
	                	<li><a class="white-text" href="#!">Facebook</a></li>
	                	<li><a class="white-text" href="#!">Twitter</a></li>
	                	<li><a class="white-text" href="#!">Instagram</a></li>
	                </ul>
              	</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
				© 2017 Copyright
			</div>
		</div>
	</footer>


<script type="text/javascript" src="js/jquery-3.1.1.js"></script>
{!! MaterializeCSS::include_js() !!}
<script type="text/javascript">

	$(document).ready(function(){
    	$('.parallax').parallax();
		$(".button-collapse").sideNav();
		$('.modal').modal({opacity: .8});
		$('.carousel.carousel-slider').carousel({fullWidth: true});
		$('.scrollspy').scrollSpy();
    });

	var options = [
      {selector: '#img', offset: 0, callback: function(el) {
        Materialize.fadeInImage($(el));
	  } },
	  {selector: '#img2', offset: 0, callback: function(el) {
	  Materialize.fadeInImage($(el));
	  } }
    ];
    Materialize.scrollFire(options);

</script>
</body>
</html>
