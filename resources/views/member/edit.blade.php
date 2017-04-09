{{-- Instanciando layout --}}
@extends('layouts/main')

{{-- Titulo de la pagina --}}
@section('title')
    Editar Miembro
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
            <form class="col s8 offset-s2" action="/member/{{ $member->id }}" method="post">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <div class="row">
                    <div class="col s12 m6 input-field">
                        <input type="text" name="name" id="name" class="validate" required value="{{ $member->name or old('name')}}" data-length="30" maxlength="30" minlength="3">
                        <label data-error="incorrecto" data-success="correcto" for="name">Nombre*</label>
                    </div>
                    <div class="col s12 m6 input-field">
                        <input type="text" name="lastname" id="lastname" class="validate" required value="{{ $member->lastname or old('lastname')}}" data-length="30" maxlength="30" minlength="3">
                        <label data-error="incorrecto" data-success="correcto" for="lastname">Apellido*</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 input-field">
                        <input type="text" name="id" id="id" class="validate" required value="{{ $member->id or old('id')}}" data-length="11" maxlength="11" minlength="11" hidden>
                        <label data-error="incorrecto" data-success="correcto" for="id" hidden>C&eacute;dula*</label>
                    </div>
                    <div class="col s12  input-field">
                        <input type="text" name="nationality" id="nationality" class="validate" required value="{{ $member->nationality or old('nationality')}}" data-length="20" maxlength="20" minlength="4">
                        <label data-error="incorrecto" data-success="correcto" for="nationality">Nacionalidad*</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 input-field">
                        <input type="date" name="birthdate" id="birthdate" class="datepicker" required value="{{ $member->birthdate or old('birthdate')}}">
                        <label for="birthdate">Fecha de Nacimiento*</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input type="text" name="" id="oldCivilStatus" value="{{ $member->civil_status or old('civil_status') }}" hidden>
                        <select name="civil_status" id="civil_status" required>
                            <option name="civil_status"  disabled selected>Elija una opci&oacute;n</option>
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
                        <input type="tel" name="telephone" id="telephone" class="validate" required value="{{ $member->telephone or old('telephone')}}" data-length="12" maxlength="12" minlength="12">
                        <label data-error="incorrecto" data-success="correcto" for="telephone">Telef&oacute;no*</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input type="text" name="" id="oldGender" value="{{ $member->gender or old('gender') }}" hidden>
                        <select name="gender" id="gender" required>
                            <option name="gender" disabled selected>Elija un género</option>
                            <option name="gender" value="M">M</option>
                            <option name="gender" value="F">F</option>
                        </select>
                        <label for="gender">Género*</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 input-field">
                        <input type="email" name="email" id="email" class="validate" required value="{{ $member->email or old('email')}}" data-length="50" maxlength="50" minlength="11">
                        <label data-error="incorrecto" data-success="correcto" for="email">Correo Electr&oacute;nico*</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 input-field">
                        <input type="text" name="address" id="address" class="validate" required value="{{ $member->address or old('address')}}" data-length="70" maxlength="70" minlength="6">
                        <label data-error="incorrecto" data-success="correcto" for="address">Direcci&oacute;n*</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 input-field">
                        <input type="text" id="oldCity" value="{{ $member->city_id or old('city') }}" hidden>
                        <select name="city" id="city" required>
                            <option name="city" value="null" disabled selected>Elija una ciudad</option>
                            @foreach($cities as $city)
                                <option name="city" value="{{ $city->id }}">{{ $city->city }}</option>
                            @endforeach
                        </select>
                        <label for="city">Ciudad*</label>
                    </div>
                    <div class="col s12 m6 input-field">
                        <input type="text" id="oldDelegation" value="{{ $member->delegation_id or old('delegation') }}" hidden>
                        <select name="delegation" id="delegation" required>
                            <option name="delegation" value="null" disabled selected>Elija una delegaci&oacute;n</option>
                            @foreach($delegations as $delegation)
                                <option name="delegation" value="{{ $delegation->id }}">{{ $delegation->delegation }}</option>
                            @endforeach
                        </select>
                        <label for="delegation">Delegaci&oacute;n*</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input type="text" id="oldStatus" value="{{ $member->status or old('status') }}" hidden>
                        <select id="status" name="status" required>
                            <option name="status" value="null" disabled selected>Elija un estado</option>
                            <option name="status" value="aspirante">Aspirante</option>
                            <option name="status" value="pasivo">Pasivo</option>
                            <option name="status" value="activo">Activo</option>
                            <option name="status" value="colaborador">Colaborador</option>
                            <option name="status" value="honor">Honor</option>
                        </select>
                        <label for="status">Estado</label>
                    </div>
                </div>
                <div class="row">
                    @foreach($document->all() as $documentss)
                        <input type="checkbox" name="document_member" value="{{ $documentss->id }}" id="document_member[]" hidden>
                    @endforeach
                    @foreach($documents as $document)
                        <div class="col s12 m6">
                            <p>
                                <input type="checkbox" class="filled-in" name="document[{{ $document->id }}]" id="document[{{ $document->id }}]" value="{{ $document->id or old('document[$document->id]') }}"/>
                                <label for="document[{{ $document->id }}]">{{ $document->document }}</label>
                            </p>
                        </div>
                    @endforeach
                </div>
                <div class="divider"></div>
                <p class="red-text">Los campos marcados con * son de caracter obligatorio.</p>
                <a href="/member" class="btn-flat waves-effect waves-red red-text text-darken-3">Atr&aacute;s</a>
                <button class="btn yellow darken-3 waves-effect right pulse" type="submit" name="submit">Editar</button>
            </form>
        </div>
    </div>
@endsection
