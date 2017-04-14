@extends('layouts.main')

    @section('title')
        Editar Miembro
    @endsection

    @section('content')
        <div class="row card-panel white">
            @include('layouts.errors')
            <form action="/update2Charge/{{ $charge[0]->id }}/{{ $charge[0]->charge_id }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="input-field col s12 m6">
                    <?php $fullname = $charge[0]->name.' '.$charge[0]->lastname; ?>
                    <input type="text" name="member" value="{{ $fullname or old('member') }}" readonly>
                </div>
                <div class="input-field col s12 m3">
                    <input type="date" class="datepicker" name="starting_date" value="{{ $charge[0]->starting_date }}">
                    <label for="starting_date">Fecha de Inicio</label>
                </div>
                <div class="input-field col s12 m3">
                    <input type="date" class="datepicker" name="ending_date" value="{{ $charge[0]->ending_date }}">
                    <label for="ending_date">Fecha de Finalizacion</label>
                </div>
                <a href="/charge/{{ $charge[0]->charge_id }}" class="btn btn-flat waves-effect">Atras</a>
                <button type="submit" class="btn yellow darken-3 waves-effect right" name="button">Guardar</button>
            </form>
        </div>
    @endsection
