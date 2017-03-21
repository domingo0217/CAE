
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
  <span class="label label-success">Usuario Creado<i class="fa fa-check"></i></span><br/>
<label style='color:#177F6B'>
              <?php  echo $msj; ?> 
</label> 

</div>

 <div class="margin" style="margin-top:50px; text-align:center;margin-bottom: 50px;">
             
             <div class="btn-group">
                      <a href="{{ url("/form_nuevo_usuario") }}"  onclick="cargar_formulario(1);" class="btn btn-success"    value=" "  > Crear Nuevo Usuario</a>
                   
             </div>
</div>
              <div class="btn-group" style="margin-left:100px; " >
                     
                      <a href="{{ url("/listado_usuarios") }}" class="btn btn-info"    value=" "  > Listado  de Usuarios </a>
             </div>
       

 </div> 


 

 </div> 
@endsection
