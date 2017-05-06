
{{-- Instanciando layout --}}
@extends('layouts/main')

{{-- Titulo de la pagina --}}
@section('title')
    REPORTES DEL SISTEMA
@endsection

{{-- Contenido de la pagina --}}
@section('content')

<section class="content" >
 <div class="section white z-depth-0">
        
<div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title"></h3>
                  <div class="box-tools">
                    
                      
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                   
                    <thead><tr>
                      <th>ID</th>
                      <th>reporte</th>
                      <th>ver</th>
                      <th>descargar</th>
                    </tr></thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td>Reporte de Usuarios activos en la asosiacion CAE</td>
                      <td><a href="crear_reporte_por_miembros_activos/1" target="_blank" ><i class="material-icons yellow-text text-darken-3">visibility</i></a></td>
                      <td><a href="crear_reporte_por_miembros_activos/2" target="_blank" ><i class="material-icons yellow-text text-darken-3">system_update_alt</i></a></td>
                    
                    </tr>
                   
                  </tbody></table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
            </div>
            
            </section>
 

 @endsection