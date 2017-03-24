

{{-- Instanciando layout --}}
@extends('layouts/main')

{{-- Titulo de la pagina --}}
@section('title')
    Listado de Usuario
@endsection

{{-- Contenido de la pagina --}}
@section('content')
<section  id="contenido_principal">

	<div class="section white z-depth-1">
        <div class="row">
        <div>
    <form class="col s8 offset-s2" action="{{ url('buscar_usuario') }}" method="post">
<div class="box box-primary box-gris">

     <div class="box-header">
        <h4 class="box-title"> Buscar Usuarios</h4>	        
       
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
				<div class="input-group input-group-sm">

					<input type="text" class="form-control" id="dato_buscado" name="dato_buscado" required>

					<span class="input-group-btn">
				
                    
					<input type="submit" class="btn yellow darken-3 waves-effect right" value="buscar" >
					</span>

				
						
        
</div>

		<div class="margin" id="botones_control">
      
                                          
		</div>

    </div>

<div class="box-body box-white">

    <div class="table-responsive" >

	    <table  class="table table-hover table-striped responsive" cellspacing="0" width="100%">
				<thead>
						<tr>    <th>codigo</th>
								<th>Rol</th>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Telefono</th>
								<th>Email</th>
							    <th>Acción</th>

						</tr>
				</thead>
	    <tbody>

	    @foreach($usuarios as $usuario)
		<tr role="row" class="odd">
			<td> {{ $usuario-> id }} </td>
			<td><span class="label label-default">
             
             @foreach($usuario->getRoles() as $roles)
			  {{ $rol->name }}
             @endforeach
           
             -</span>
			</td>
			<td class="mailbox-messages mailbox-name"><a href="javascript:void(0);"  style="display:block"><i class="fa fa-user"></i>&nbsp;&nbsp; {{ $usuario->name  }} </a></td>
			<td> {{ $usuario-> lastname }} </td>
			<td> {{ $usuario->telefhone }}</td>
			<td> {{ $usuario->email }} </td>
			<td> <button type="" name="" class="btn-floating btn-flat waves-effect waves-dark white tooltipped" data-position="right" data-delay="50" data-tooltip="Eliminar">
                                            <i class="material-icons yellow-text text-darken-3">delete</i>
                                        </button>
	
			</td>
			
		</tr>
	    @endforeach



		</tbody>
		</table>
</form>
	</div>

</div>
</div>
</div>
</div>



{{ $usuarios->links() }}

@if(count($usuarios)==0)


<div class="box box-primary col-xs-12">

<div class='aprobado' style="margin-top:70px; text-align: center">
 
<label style='color:#177F6B'>
              ... no se encontraron resultados para su busqueda...
</label> 

</div>

 </div> 


@endif

</div></section>
@endsection