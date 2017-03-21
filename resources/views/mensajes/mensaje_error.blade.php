
{{-- Instanciando layout --}}
@extends('layouts/main')

{{-- Titulo de la pagina --}}
@section('title')
    Mensaje
@endsection

{{-- Contenido de la pagina --}}
@section('content')
 <br/><div class='rechazado'><label style='color:#FA206A'><?php  echo $msj; ?></label>  </div> 

 @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
  @endif
@endsection