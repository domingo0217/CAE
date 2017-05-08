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
            <form class="col s10 offset-s1" action="/member" method="post">

                {{ csrf_field() }}
                <div class="row">
                    <div class="col s12 m4 input-field">
                        <input type="text" name="name" id="name" class="validate" required value="{{ old('name')}}" data-length="30" maxlength="30" minlength="3">
                        <label data-error="incorrecto" data-success="correcto" for="name">Nombre*</label>
                    </div>
                    <div class="col s12 m4 input-field">
                        <input type="text" name="lastname" id="lastname" class="validate" required value="{{ old('lastname')}}" data-length="30" maxlength="30" minlength="3">
                        <label data-error="incorrecto" data-success="correcto" for="lastname">Apellido*</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m4 input-field">
                        <input type="text" name="nationality" id="nationality" class="validate" required value="{{ old('nationality')}}" data-length="20" maxlength="20" minlength="4">
                        <label data-error="incorrecto" data-success="correcto" for="nationality">Nacionalidad*</label>
                    </div>
                    <div class="col s12 m4 input-field">
                        <input type="date" name="birthdate" id="birthdate" class="datepicker" required value="{{ old('birthdate')}}">
                        <label for="birthdate">Fecha de Nacimiento*</label>
                    </div>
                    <div class="input-field col s12 m4">
                        <select name="civil_status" id="civil_status" required>
                            <option name="civil_status" disabled selected>Estado civil*</option>
                            <option name="civil_status" value="soltero">Soltero</option>
                            <option name="civil_status" value="casado">Casado</option>
                            <option name="civil_status" value="divorciado">Divorciado</option>
                            <option name="civil_status" value="viudo">Viudo</option>
                        </select>
                        <input type="text" name="" id="oldCivilStatus" value="{{ old('civil_status') }}" hidden>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m4 input-field">
                        <input type="tel" name="telephone" id="telephone" onkeypress="return isNumberKey(event);" class="validate" required value="{{ old('telephone')}}" data-length="12" maxlength="12" minlength="12">
                        <label data-error="incorrecto" data-success="correcto" for="telephone">Telef&oacute;no*</label>
                    </div>
                    <div class="input-field col s12 m4">
                        <input type="text" name="" id="oldGender" value="{{ old('gender') }}" hidden>
                        <select name="gender" id="gender" required>
                            <option name="gender" disabled selected>Género*</option>
                            <option name="gender" value="M">M</option>
                            <option name="gender" value="F">F</option>
                        </select>
                    </div>
                    <div class="col s12 m4 input-field">
                        <input type="email" name="email" id="email" class="validate" required value="{{ old('email')}}" data-length="50" maxlength="50" minlength="11">
                        <label data-error="incorrecto" data-success="correcto" for="email">Correo Electr&oacute;nico*</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 l6 input-field">
                        <input type="text" name="address" id="address" class="validate" required value="{{ old('address')}}" data-length="70" maxlength="70" minlength="6">
                        <label data-error="incorrecto" data-success="correcto" for="address">Direcci&oacute;n*</label>
                    </div>
                    <div class="col s12 m4 l3 input-field">
                        <input type="text" id="idoc" value="{{ old('idoc') }}" hidden>
                        <input name="idoc" type="radio" value="0" id="idoc1" checked>
                        <label for="idoc1">Cédula</label>
                        <input name="idoc" type="radio" value="1" id="idoc2">
                        <label for="idoc2">Pasaporte</label>
                    </div>
                    <div class="col s12 m8 l3 input-field">
                        <input type="text" name="id" id="id" class="validate" required value="{{ old('id')}}" data-length="11" maxlength="11" minlength="11">
                        <label data-error="incorrecto" data-success="correcto" for="id">Cédula o Pasaporte* </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m4 input-field">
                        <input type="text" id="oldCity" value="{{ old('city') }}" hidden>
                        <select name="city" id="city" required>
                            <option name="city" value="null" disabled selected>Ciudad*</option>
                            @foreach($cities as $city)
                                <option name="city" value="{{ $city->id }}">{{ $city->city }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col s12 m4 input-field">
                        <input type="text" id="oldDelegation" value="{{ old('delegation') }}" hidden>
                        <select name="delegation" id="delegation" required>
                            <option name="delegation" value="null" disabled selected>Delegaci&oacute;n*</option>
                            @foreach($delegations as $delegation)
                                <option name="delegation" value="{{ $delegation->id }}">{{ $delegation->delegation }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-field col s12 m4">
                        <input type="text" id="oldStatus" value="{{ old('status') }}" hidden>
                        <select id="status" name="status" required>
                            <option name="status" value="null" disabled selected>Estado</option>
                            <option name="status" value="aspirante">Aspirante</option>
                            <option name="status" value="pasivo">Pasivo</option>
                            <option name="status" value="activo">Activo</option>
                            <option name="status" value="colaborador">Colaborador</option>
                            <option name="status" value="honor">Honor</option>
                        </select>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="row">
                    <div class="col s12 m6">
                        <p><strong> Frecuencia de pago* </strong></p>
                        <input type="text" id="pagos" value="{{ old('payment') }}" hidden>
                        <input name="payment" type="radio" value="mensual" id="payment1" checked>
                        <label for="payment1">Mensual</label>
                        <input name="payment" type="radio" value="trimestral" id="payment2">
                        <label for="payment2">Trimestral</label>
                        <input name="payment" type="radio" value="semestral" id="payment3">
                        <label for="payment3">Semestral</label>
                        <input name="payment" type="radio" value="anual" id="payment4" >
                        <label for="payment4">Anual</label>
                    </div>
                    <div class="col s12 m6">
                        <p><strong>Documentos presentados</strong></p>
                        @foreach($documents as $document)
                            <div class="col s12 m6">
                                <p>
                                    <input type="checkbox" class="filled-in" name="document[{{ $document->id }}]" id="document[{{ $document->id }}]" value="{{ $document->id or old('document[$document->id]') }}"/>
                                    <label for="document[{{ $document->id }}]">{{ $document->document }}</label>
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="divider"></div>
                <p class="red-text">Los campos marcados con * son de caracter obligatorio.</p>
                <a href="/member" class="btn-flat waves-effect waves-red red-text text-darken-3">Atr&aacute;s</a>
                <button class="btn yellow darken-3 waves-effect right" type="submit" name="submit">Agregar</button>
            </form>
        </div>
    </div>
@endsection
