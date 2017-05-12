
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
                    <form class="col s10 offset-s1" action="{{ url("/crear_reporte_delegacion/1") }}"" method="post">
                      
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <    <div class="row">
                    <div class="col s12 m4 input-field">
                        <input type="text" name="delegation" id="delegation" class="validate" required value="{{ old('delegation')}}" data-length="30" maxlength="30" minlength="3">
                        <label data-error="incorrecto" data-success="correcto" for="delegation">Nombre*</label>
                    </div>

                    
                      <a href="crear_reporte_delegacion/1" target="_blank" ><i class="material-icons yellow-text text-darken-3">visibility</i></a>
                                        
                  </div></form>
                   
                  </tbody></table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
            </div>
            
            </section>
 

 @endsection