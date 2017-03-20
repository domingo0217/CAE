{{-- Instanciando layout --}}
@extends('layouts/main')

{{-- Titulo de la pagina --}}
@section('title')
    Agregar Usuario
@endsection

{{-- Contenido de la pagina --}}
@section('content')
    <div class="section white z-depth-0">
        <div class="row">
            <form class="col s8 offset-s2" action="" method="post">
                <div class="row">
                    <div class="col s12 m6 input-field">
                        <input type="text" name="name" value="" id="name" class="validate">
                        <label data-error="wrong" data-success="right" for="name">Nombre de Ususario</label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col s12 m6 input-field">
                        <input type="text" name="lastname" value="" id="clave" class="validate">
                        <label data-error="wrong" data-success="right" for="clave">Contraseña</label>
                    </div>
                </div>
               
                <button class="btn yellow darken-3 waves-effect right" type="submit" name="submit">Agregar</button>
            </form>
        </div>
    </div>
@endsection

