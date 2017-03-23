{{-- Instanciando layout --}}
@extends('layouts/main')

{{-- Titulo de la pagina --}}
@section('title')
    Agregar Nuevo  Usuario
@endsection

{{-- Contenido de la pagina --}}
@section('content')


<section class="content" >
 <div class="section white z-depth-0">
        <div class="row">
         @include('layouts.errors')
         <form class="col s8 offset-s2" action="{{ url('crear_usuario') }}"  method="post">
 
              
      
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 

<div class="row">
                    <div class="col s12 m6 input-field">
                    <div class="form-group">
                        <input type="text" name="name" value="" id="name" data-length="20"  class="validate" required>
                        <label data-error="incorrecto" data-success="correcto" for="name">Nombre</label>
                    </div>
                    </div>
                    <div class="col s12 m6 input-field">
                     <div class="form-group">
                        <input type="text" name="lastname" value="" id="lastname" data-length="20" class="validate" required>
                       <label data-error="incorrecto" data-success="correcto" for="lastname">Apellido</label>
                    </div>
                </div>
                </div>
<div class="row">
                    <div class="col s12 m6 input-field">
                    <div class="form-group">
                        <input type="text" name="telefhone" value="" id="telefhone"  data-length="20" class="validate" required>
                        <label data-error="incorrecto" data-success="correcto" for="telefhone">Telefono</label>
                    </div>
                    </div>

                    <div class="col s12 m6 input-field">
                     <div class="form-group">
                        <input type="email" name="email" value="" id="email"  data-length="30" class="validate" required>
                      <label data-error="incorrecto" data-success="correcto" for="email">Email</label>
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 input-field">
                    <div class="form-group">
                        <input type="password" name="password" value="" id="password"  data-length="20" class="validate" required>
                       <label data-error="incorrecto" data-success="correcto" for="email">Contrasena</label>
                    </div>
                    
</div>
</div>
                    <div >
                  <button class="btn yellow darken-3 waves-effect right" type="submit">Agregar</button>
                    </div>

                   </form>
                   </div>
                   </div>
                    </div>

                    </div>
                    
</section>
@endsection
