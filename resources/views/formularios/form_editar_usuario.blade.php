{{-- Instanciando layout --}}
@extends('layouts/main')

{{-- Titulo de la pagina --}}
@section('title')
    Editar Usuario
@endsection

{{-- Contenido de la pagina --}}
@section('content')
<section >



  <div class="box box-primary box-gris">

      <div class="box-header with-border my-box-header">
        <h3 class="box-title"><strong>Editar Informacion Usuario</strong></h3>
      </div><!-- /.box-header -->
      <hr style="border-color:white;" />
      <div id="notificacion_E2" ></div>
      <div class="box-body">



          <form   action="{{ url('editar_usuario') }}"  method="post" id="f_editar_usuario"  class="formentrada"  >
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="id_usuario" value="{{ $usuario->id }}">

          <div class="col-md-6">
              <div class="form-group">
                    <label class="col-sm-2" for="name">Nombres</label>
                    <div class="col-sm-10" >
                      <input type="text" class="form-control" id="name" name="name"  value="{{ $usuario->name }}"  required   >
                       </div>
              </div><!-- /.form-group -->
          </div><!-- /.col -->

          <div class="col-md-6">
              <div class="form-group">
                    <label class="col-sm-2" for="lastname">Apellido</label>
                    <div class="col-sm-10" >
                    <input type="text" class="form-control" id="lastname" name="lastname" "  value="{{ $usuario->lastname}}" required >
                    </div>
              </div><!-- /.form-group -->
          </div><!-- /.col -->

          <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-sm-2" for="telefhone">Telefono</label>

                       <div class="col-sm-10" >
                        <input type="text" class="form-control" id="telefhone" name="telefhone"  value="{{ $usuario->telefhone  }}" required >
                       </div>

                      </div><!-- /.form-group -->
          </div><!-- /.col -->

          <div class="box-footer col-xs-12 box-gris ">
                <button type="submit" class="btn btn-primary">Actualizar Datos</button>
          </div>

          </form>




      </div>

    </div>







  </div>
  </div>
</div>
</section>
@endsection
