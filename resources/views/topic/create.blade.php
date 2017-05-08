@extends('layouts.main')

    @section('title')
        Crear tema
    @endsection

    @section('content')
        <div class="row card-panel white">
            @include('layouts.errors')
            <form action="/topic" method="post">
                {{ csrf_field() }}
                <div class="input-field col s12 ">
                    <input type="text" name="topic" value="{{ old('topic') }}" class="validate" required minlength="3">
                    <label for="topic" data-error="incorrecto" data-success="correcto">Tema</label>
                    <input type="text" name="assembly_id" value="{{ $assembly->id }}" hidden>
                </div>
                <a href="listTopic/{{ $assembly->id }}" class="btn-flat waves-effect">Atras</a>
                <button type="submit" class="btn waves-effect yellow darken-3 right">Guardar</button>
            </form>
        </div>
    @endsection
