{{-- Instanciando layout --}}
@extends('layouts/main')

{{-- Titulo de la pagina --}}
@section('title')
    Agregar Nuevo Permiso
@endsection

{{-- Contenido de la pagina --}}
@section('content')


<div class="section white z-depth-0">
        <div class="row">
         @include('layouts.errors')
         
    <form class="col s8 offset-s2" action="{{ url('asignar_permiso') }}" method="post">
              
			 @include('layouts.status')


			  

  <div class="col-md-6">
		            
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
						<div class="form-group">
							<label class="col-sm-2" for="rol">Rol</label>
		    			<div class="col-sm-10" >
		                     
		                     <select id="rol_sel" name="rol_sel" class="form-control" required>
		                     @foreach($roles as $rol)
		                     <option value="{{ $rol->id }}">{{ $rol->name }}</option>
		                     @endforeach
		    				</select>
		                     
		                </div>
						</div><!-- /.form-group -->

						<div class="form-group">
							<label class="col-sm-2" for="rol">Permisos</label>
		    			<div class="col-sm-10" >
		                     
		                     <select id="permiso_rol" name="permiso_rol" class="form-control" required>
		                     @foreach($permisos as $permiso)
		                     <option value="{{ $permiso->id }}">{{ $permiso->name }}</option>
		                     @endforeach
		    				</select>
		                     
		                </div>
						</div><!-- /.form-group -->

						<div >
		                           <button class="btn yellow darken-3 waves-effect right" type="submit">Agregar</button>
		                </div>
					 </form>
		        </div>
		        </div>


@endsection


