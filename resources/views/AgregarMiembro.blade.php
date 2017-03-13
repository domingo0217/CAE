{{-- Instanciando layout --}}
@extends('layouts/main')

{{-- Titulo de la pagina --}}
@section('title')
    Agregar Miembro
@endsection

{{-- Contenido de la pagina --}}
@section('content')
    <div class="section white z-depth-0">
        <div class="row">
            <form class="col s8 offset-s2" action="" method="post">
                <div class="row">
                    <div class="col s12 m6 input-field">
                        <input type="text" name="name" value="" id="name" class="validate">
                        <label data-error="wrong" data-success="right" for="name">Nombre</label>
                    </div>
                    <div class="col s12 m6 input-field">
                        <input type="text" name="lastname" value="" id="lastname" class="validate">
                        <label data-error="wrong" data-success="right" for="lastname">Apellido</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 input-field">
                        <input type="text" name="id" value="" id="id" class="validate">
                        <label data-error="wrong" data-success="right" for="id">C&eacute;dula</label>
                    </div>
                    <div class="col s12 m6 input-field">
                        <input type="text" name="nationality" value="" id="nationality" class="validate">
                        <label data-error="wrong" data-success="right" for="nationality">Nacionalidad</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 input-field">
                        <input type="date" name="date" id="date" class="datepicker">
                        <label for="date">Fecha de Nacimiento</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <select>
                            <option value="" disabled selected>Elija una opci&oacute;n</option>
                            <option value="1">Soltero</option>
                            <option value="2">Casado</option>
                            <option value="3">Divorciado</option>
                            <option value="4">Viudo</option>
                        </select>
                        <label>Estado civil</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 input-field">
                        <input type="email" name="email" id="email" value="">
                        <label data-error="wrong" data-success="right" for="email">Correo Electr&oacute;nico</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 input-field">
                        <input type="tel" name="tel" value="" id="tel" class="validate">
                        <label data-error="wrong" data-success="right" for="tel">Telef&oacute;no</label>
                    </div>
                    <div class="col s12 m6 input-field">
                        <input type="tel" name="tel" value="" id="tel" class="validate">
                        <label data-error="wrong" data-success="right" for="tel">Celular</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 input-field">
                        <input type="text" name="address" value="" id="address" class="validate">
                        <label data-error="wrong" data-success="right" for="address">Direcci&oacute;n</label>
                    </div>
                    <div class="col s12 m6 input-field">
                        <input type="text" name="city" value="" id="city" class="validate">
                        <label data-error="wrong" data-success="right" for="city">Ciudad</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 input-field">
                        <input type="text" name="city" value="" id="city" class="validate">
                        <label data-error="wrong" data-success="right" for="city">Delegaci&oacute;n</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <select>
                            <option value="" disabled selected>Elija una opci&oacute;n</option>
                            <option value="1">Presidente</option>
                            <option value="2">Director Ejecutivo</option>
                            <option value="3">Vicepresidente</option>
                            <option value="4">Tesorero</option>
                        </select>
                        <label>Cargo en la instituci&oacute;n</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <select multiple>
                            <option value="" disabled selected>Elija una opci&oacute;n</option>
                            <option value="1">Acta de buena conducta</option>
                            <option value="2">Acta de nacimiento</option>
                        </select>
                        <label>Documentos presentados</label>
                    </div>

                </div>
                <button class="btn yellow darken-3 waves-effect right" type="submit" name="submit">Agregar</button>
            </form>
        </div>
    </div>
@endsection
