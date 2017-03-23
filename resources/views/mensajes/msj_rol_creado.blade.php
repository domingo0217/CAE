
{{-- Instanciando layout --}}
@extends('layouts/main')

{{-- Titulo de la pagina --}}
@section('title')
    Mensaje
@endsection
{{-- Contenido de la pagina --}}
@section('content')
<div class="box box-primary col-xs-12">


<div class='aprobado' style="margin-top:200px; text-align: center">
  <span class="label label-success">Rol Creado<i class="fa fa-check"></i></span><br/>
<label style='color:#177F6B'>
              <?php  echo $msj; ?> 
</label> 

</div>

 <div class="margin" style="margin-top:50px; text-align:center;margin-bottom: 50px;">
             
             <div class="btn-group">
                      <a href="{{ url("/form_nuevo_rol") }}"  onclick="cargar_formulario(2);" class="btn btn-success"    value=" "  > Crear nuevo Rol</a>
                   
             </div>

              <div class="btn-group" style="margin-left:50px; " >
                     
                      <a href="{{ url("/listado_roles") }}" class="btn btn-info"    value=" "  > Listado de Roles</a>
             </div>
       

 </div> 


 

 </div> 
 @endsection