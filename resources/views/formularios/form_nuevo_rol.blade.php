
{{-- Instanciando layout --}}
@extends('layouts/main')

{{-- Titulo de la pagina --}}
@section('title')
   Agregar Nuevo Rol
@endsection
{{-- Contenido de la pagina --}}
@section('content')

<section  >
 <div class="section white z-depth-0">
        <div class="row">
         
          
         <form class="col s8 offset-s2" action="{{ url('crear_rol') }}"  method="post">
         <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
<div class="col-md-12">

    <div class="box box-primary  box-gris">
 
              @include('layouts.status')
            	  @include('layouts.errors')
               

                <div class="row">
                    <div class="col s12 m6 input-field">
                    <div class="form-group">
                        <input type="text" name="rol_nombre" value="" id="rol_nombre" data-length="20"  class="validate" required>
                                   <label data-error="incorrecto" data-success="correcto" for="rol_nombre">Nombre</label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col s12 m6 input-field">
                     <div class="form-group">
                        <input type="text" name="rol_slug" value="" id="rol_slug"   data-length="20"  class="validate"required>
                                     <label data-error="incorrecto" data-success="correcto" for="rol_slug">Slug</label>
                    </div>
                </div>
                </div>
<div class="row">
                    <div class="col s12 m6 input-field">
                    <div class="form-group">
                        <input type="text" name="rol_descripcion" value="" id="rol_descripcion" data-length= "30"  class="validate" required>
                                     <label data-error="incorrecto" data-success="correcto" for="rol_descripcion">Descripcion</label>
                    </div>
                    </div>
               

			     </div>

                <div>
                      <button class="btn yellow darken-3 waves-effect right" type="submit">Agregar</button>
                    
                </div>
            </form>
                    
            </div>
            </div>
            </div>
                    
    </div>
                       
</div>




	</div>
</div>


</section>
@endsection