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
            <div class="card-panel red lighten-4 z-depth-0">
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="red-text">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <form class="col s8 offset-s2" action="/member" method="post">

                {{ csrf_field() }}
                <div class="row">
                    <div class="col s12 m6 input-field">
                        <input type="text" name="name" id="name" class="validate" required value="{{ old('name')}}" data-length="30" maxlength="30" minlength="3">
                        <label data-error="incorrecto" data-success="correcto" for="name">Nombre*</label>
                    </div>
                    <div class="col s12 m6 input-field">
                        <input type="text" name="lastname" id="lastname" class="validate" required value="{{ old('lastname')}}" data-length="30" maxlength="30" minlength="3">
                        <label data-error="incorrecto" data-success="correcto" for="lastname">Apellido*</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 input-field">
                        <input type="text" name="id" id="id" class="validate" required value="{{ old('id')}}" data-length="11" maxlength="11" minlength="11">
                        <label data-error="incorrecto" data-success="correcto" for="id">C&eacute;dula*</label>
                    </div>
                    <div class="col s12 m6 input-field">
                        <input type="text" name="nationality" id="nationality" class="validate" required value="{{ old('nationality')}}" data-length="20" maxlength="20" minlength="4">
                        <label data-error="incorrecto" data-success="correcto" for="nationality">Nacionalidad*</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 input-field">
                        <input type="date" name="birthdate" id="birthdate" class="datepicker" required value="{{ old('birthdate')}}">
                        <label for="birthdate">Fecha de Nacimiento*</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <select name="civil_status" id="civil_status" required>
                            <option name="civil_status" disabled>Elija una opci&oacute;n</option>
                            <option name="civil_status" id="oldCivilStatus" hidden>{{ old('civil_status')}}</option>
                            <option name="civil_status" value="soltero">Soltero</option>
                            <option name="civil_status" value="casado">Casado</option>
                            <option name="civil_status" value="divorciado">Divorciado</option>
                            <option name="civil_status" value="viudo">Viudo</option>
                        </select>
                        <label for="civil_status">Estado civil*</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 input-field">
                        <input type="tel" name="telephone" id="telephone" class="validate" required value="{{ old('telephone')}}" data-length="12" maxlength="12" minlength="12">
                        <label data-error="incorrecto" data-success="correcto" for="telephone">Telef&oacute;no*</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <select name="gender" required value="{{ old('gender') }}">
                            <option name="gender" disabled>Elija un género</option>
                            <span><option name="gender" id="oldGender" hidden>{{ old('gender') }}</option></span>
                            <option name="gender" value="M">M</option>
                            <option name="gender" value="F">F</option>
                            <option name="gender" value="otro">otro</option>
                        </select>
                        <label for="gender">Género*</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 input-field">
                        <input type="email" name="email" id="email" class="validate" required value="{{ old('email')}}" data-length="50" maxlength="50" minlength="11">
                        <label data-error="incorrecto" data-success="correcto" for="email">Correo Electr&oacute;nico*</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 input-field">
                        <input type="text" name="address" id="address" class="validate" required value="{{ old('address')}}" data-length="70" maxlength="70" minlength="15">
                        <label data-error="incorrecto" data-success="correcto" for="address">Direcci&oacute;n*</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 input-field">
                        <select name="city" required value="{{ old('city')}}">
                            <option name="city" id="city" value="null" disabled selected>Elija una ciudad</option>
                            @foreach($cities as $city)
                                <option name="city" id="city" value="{{ $city->id }}">{{ $city->city }}</option>
                            @endforeach
                        </select>
                        <label for="city">Ciudad*</label>
                    </div>
                    <div class="col s12 m6 input-field">
                        <select name="delegation" required value="{{ old('delegation')}}">
                            <option name="delegation" id="delegation" value="null" disabled selected>Elija una delegaci&oacute;n</option>
                            @foreach($delegations as $delegation)
                                <option name="delegation" id="delegation" value="{{ $delegation->id }}">{{ $delegation->delegation }}</option>
                            @endforeach
                        </select>
                        <label for="delegation">Delegaci&oacute;n*</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <select name="document" id="document" multiple required value="{{ old('document')}}">
                            <option name="document" id="document" value="null" disabled selected>Elija una opci&oacute;n</option>
                            <option name="document" id="document" value="acta de buena conducta">Acta de buena conducta</option>
                            <option name="document" id="document" value="acta de nacimiento">Acta de nacimiento</option>
                        </select>
                        <label for="document">Documentos presentados*</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <select id="status" name="status" required value="{{ old('status')}}">
                            <option name="status" id="status" value="null" disabled selected>Elija un estado</option>
                            <option name="status" id="status" value="aspirante">Aspirante</option>
                            <option name="status" id="status" value="pasivo">Pasivo</option>
                            <option name="status" id="status" value="activo">Activo</option>
                            <option name="status" id="status" value="colaborador">Colaborador</option>
                            <option name="status" id="status" value="honor">Honor</option>
                        </select>
                        <label for="status">Estado</label>
                    </div>

                </div>
                <a href="/member" class="btn-flat waves-effect waves-red red-text text-darken-3">Atr&aacute;s</a>
                <button class="btn yellow darken-3 waves-effect right pulse" type="submit" name="submit">Agregar</button>
            </form>
        </div>
    </div>
@endsection
