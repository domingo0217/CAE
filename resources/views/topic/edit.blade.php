@extends('layouts.main')

    @section('title')
        Editar tema
    @endsection

    @section('content')
        <div class="row card-panel white">
            @include('layouts.errors')
            <form action="/topic/{{ $topic->id }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH')}}
                <div class="input-field col s12 ">
                    <input type="text" name="topic" value="{{ $topic->topic or old('topic') }}" class="validate" required minlength="3">
                    <label for="topic" data-error="incorrecto" data-success="correcto">Tema</label>
                    <input type="text" name="assembly_id" value="{{ $topic->assembly_id }}" hidden>
                </div>
                <a href="/listTopic/{{ $topic->assembly_id }}" class="btn-flat waves-effect">Atras</a>
                <button type="submit" class="btn waves-effect yellow darken-3 right">Guardar</button>
            </form>
        </div>
    @endsection
