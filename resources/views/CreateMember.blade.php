{{-- Instanciando layout --}}
@extends('layouts/main')

{{-- Titulo de la pagina --}}
@section('title')
    Agregar Miembro
@endsection

{{-- Contenido de la pagina --}}
@section('content')
    <div class="section white z-depth-1">
        @if (count($errors) > 0)
            <div class="card-panel red accent-2 z-depth-0">
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="white-text">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <form class="col s8 offset-s2" action="/member" method="post">

                {{ csrf_field() }}
                <div class="row">
                    <div class="col s12 m6 input-field">
                        <input type="text" name="name" value="" id="name" class="validate" required data-length="30" maxlength="30">
                        <label data-error="incorrecto" data-success="correcto" for="name">Nombre</label>
                    </div>
                    <div class="col s12 m6 input-field">
                        <input type="text" name="lastname" value="" id="lastname" class="validate" required data-length="30" maxlength="30">
                        <label data-error="incorrecto" data-success="correcto" for="lastname">Apellido</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 input-field">
                        <input type="text" name="id" value="" id="id" class="validate" required data-length="11" maxlength="11">
                        <label data-error="incorrecto" data-success="correcto" for="id">C&eacute;dula</label>
                    </div>
                    <div class="col s12 m6 input-field">
                        <input type="text" name="nationality" value="" id="nationality" class="validate" required data-length="20" maxlength="20">
                        <label data-error="incorrecto" data-success="correcto" for="nationality">Nacionalidad</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 input-field">
                        <input type="date" name="birthdate" id="birthdate" class="datepicker" required>
                        <label for="birthdate">Fecha de Nacimiento</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <select name="civil_status" required>
                            <option name="civil_status" id="civil_status" value="null" disabled selected>Elija una opci&oacute;n</option>
                            <option name="civil_status" id="civil_status" value="soltero">Soltero</option>
                            <option name="civil_status" id="civil_status" value="casado">Casado</option>
                            <option name="civil_status" id="civil_status" value="divorciado">Divorciado</option>
                            <option name="civil_status" id="civil_status" value="viudo">Viudo</option>
                        </select>
                        <label for="civil_status">Estado civil</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 input-field">
                        <input type="email" name="email" id="email" class="validate" required data-length="50" maxlength="50">
                        <label data-error="incorrecto" data-success="correcto" for="email">Correo Electr&oacute;nico</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 input-field">
                        <input type="tel" name="telephone" value="" id="telephone" class="validate" required data-length="10" maxlength="10">
                        <label data-error="incorrecto" data-success="correcto" for="telephone">Telef&oacute;no</label>
                    </div>
                    <div class="col s12 m6 input-field">
                        <input type="text" name="address" value="" id="address" class="validate" required data-length="70" maxlength="70">
                        <label data-error="incorrecto" data-success="correcto" for="address">Direcci&oacute;n</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 input-field">
                        <input type="text" name="city" value="" id="city" class="validate" required data-length="30" maxlength="30">
                        <label data-error="incorrecto" data-success="correcto" for="city">Ciudad</label>
                    </div>
                    <div class="col s12 m6 input-field">
                        <input type="text" name="delegation" value="" id="delegation" class="validate" required data-length="30" maxlength="30">
                        <label data-error="incorrecto" data-success="correcto" for="delegation">Delegaci&oacute;n</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <select name="document" id="document" multiple required>
                            <option name="document" id="document" value="null" disabled selected>Elija una opci&oacute;n</option>
                            <option name="document" id="document" value="acta de buena conducta">Acta de buena conducta</option>
                            <option name="document" id="document" value="acta de nacimiento">Acta de nacimiento</option>
                        </select>
                        <label for="document">Documentos presentados</label>
                    </div>

                </div>
                <button class="btn yellow darken-3 waves-effect right" type="submit" name="submit">Agregar</button>
            </form>
        </div>
    </div>
@endsection
