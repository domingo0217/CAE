<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CAE | @yield('title')</title>
	{{-- Instanciando estilos y fuentes --}}
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	{{-- {!! MaterializeCSS::include_css() !!} --}}
	<link rel="stylesheet" href="../materialize-css/css/materialize.css">
	<link rel="stylesheet" type="text/css" href="../custom/css/main.css">
</head>
<body class="grey lighten-3">

	{{-- Header --}}
		@include('layouts.header')
	{{-- /Header --}}

	{{-- Main --}}
	<main class="container">
		@yield('content')
	</main>
	{{-- /Main --}}

	{{-- footer --}}
		@include('layouts.footer')
	{{-- /footer --}}

</body>
</html>
