
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
  <span class="label label-success">Usuario Actualizado<i class="fa fa-check"></i></span><br/>
<label style='color:#177F6B'>
              <?php  echo $msj; ?> 
</label> 

</div>




 

 </div> 
@endsection
