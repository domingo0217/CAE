{{-- Instanciando layout --}}
@extends('layouts/main')

{{-- Titulo de la pagina --}}
@section('title')
    Listado de Roles
@endsection

{{-- Contenido de la pagina --}}
@section('content')
<section  >
    @include('layouts.status')
   @include('layouts.errors')
        <div class="section white z-depth-0">
        <div class="row">

    <form class="col s8 offset-s2" action="" method="post">
<div class="col-md-12">

    <div class="table-responsive" >

	    <table  class="table table-hover table-striped" cellspacing="0" width="100%">
				<thead>
						<tr>    <th>codigo</th>
								<th>nombre</th>
								<th>slug</th>
								<th>descripcion</th>
							    <th>Acción</th>
						</tr>
				</thead>
	    <tbody>

	    @foreach($roles as $rol)
		<tr role="row" class="odd" id="filaR_{{  $rol->id }}">
			<td>{{ $rol->id }}</td>
			<td><span class="label label-default">{{ $rol->name or "Ninguno" }}</span></td>
			<td class="mailbox-messages mailbox-name"><a href="javascript:void(0);" style="display:block"><i class="fa fa-user"></i>&nbsp;&nbsp;{{ $rol->slug  }}</a></td>
			<td>{{ $rol->description }}</td>
			<td>

			             <td><a href="borrar_rol/{{ $rol->id }}"  class="btn-floating btn-flat waves-effect waves-dark white tooltipped" data-position="right" data-delay="50" data-tooltip="Eliminar"><i class="material-icons yellow-text text-darken-3">delete</i></a></td>


		</tr>
	    @endforeach



		</tbody>
		</table>
</form>
	</div>
</div>
</div>
</div>


</section>

@endsection
