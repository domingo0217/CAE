{{-- Instanciando layout --}}
@extends('layouts/main')

{{-- Titulo de la pagina --}}
@section('title')
    Ver Miembro
@endsection

{{-- Contenido de la pagina --}}
@section('content')
        <div class="row">
            <div class="padding white z-depth-1">
                <div class="card-panel deep-orange lighten-3">
                    <h5>{{ $member->name.' '.$member->lastname }}</h5>
                    <p class="centered"><strong>Cédula: </strong>{{ $member->id }}</p>
                    <p class="centered"><strong>Género: </strong>{{ $member->gender }}</p>
                    <p class="centered"><strong>Nacionalidad: </strong>{{ $member->nationality }}</p>
                    <p class="centered"><strong>Fecha de nacimiento: </strong>{{ $member->birthdate }}</p>
                    <p class="centered"><strong>Estado civil: </strong>{{ $member->civil_status }}</p>
                    <p class="centered"><strong>Telefóno: </strong>{{ $member->telephone }}</p>
                    <p class="centered"><strong>Correo Electrónico: </strong>{{ $member->email }}</p>
                    <p class="centered"><strong>Dirección: </strong>{{ $member->address.'. '.$member->city.'.' }}</p>
                    <p class="centered"><strong>Delegación: </strong>{{ $member->delegation }}</p>
                    <p class="centered"><strong>Estado: </strong>{{ $member->status }}</p>
                    <p class="centered"><strong>Documentos presentados: </strong>{{ $member->document }}</p>
                </div>
                <a href="/member" class="btn-flat waves-effect waves-red red-text text-darken-3">Atr&aacute;s</a>
                <form method="post" action="/member/{{ $member->id }}" id="delete" class="right">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" name="submit" class="btn red waves-effect waves-dark tooltipped " data-position="right" data-delay="50" data-tooltip="Eliminar">
                        Eliminar
                    </button>
                </form>
                <a href="/member/{{ $member->id }}/edit" class="btn yellow darken-3 waves-effect right pulse">Editar</a>
            </div>
        </div>
@endsection
