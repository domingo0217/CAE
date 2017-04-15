@extends('layouts.main')

    @section('title')
        Añadir miembro
    @endsection

    @section('content')
        <div class="row card-panel white">
            @include('layouts.errors')
            @include('layouts.statusNeg')
            <form action="/store2Charge/{{ $charge->id }}" method="post">
                {{ csrf_field() }}
                <div class="input-field col s12 m6">
                    <input type="text" id="oldMember" value="{{ old('member') }}" hidden>
                    <select class="browser-default" name="member" id="members">
                        @if($members->count() > 0 )
                            <option name="member"  disabled selected>Elija un miembro</option>
                            @foreach($members as $member)
                                <option name="member" value="{{ $member->id }}">{{ $member->id.' - '.$member->name.' '.$member->lastname }}</option>
                            @endforeach
                        @else
                            <option disabled>No hay miembros</option>
                        @endif
                    </select>
                </div>
                <div class="input-field col s12 m3">
                    <input type="date" class="datepicker" name="starting_date" value="{{ old('starting_date') }}">
                    <label for="starting_date">Fecha de Inicio</label>
                </div>
                <div class="input-field col s12 m3">
                    <input type="date" class="datepicker" name="ending_date" value="{{ old('ending_date') }}">
                    <label for="ending_date">Fecha de Finalizacion</label>
                </div>
                <a href="/charge/{{ $charge->id }}" class="btn btn-flat waves-effect">Atras</a>
                <button type="submit" class="btn yellow darken-3 waves-effect right" name="button">Guardar</button>
            </form>
        </div>
    @endsection
