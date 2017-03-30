@extends('layouts.main')

    @section('title')
        Editar Ciudad
    @endsection

    @section('content')
        <div class="section white z-depth-1">
            @include('layouts.errors')
            <div class="row">
                <form class="col s8 offset-s2" action="/city/{{$city->id}}" method="post">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col s12  input-field">
                            <input type="text" name="id" id="id" value="{{ $city->id }}" hidden>
                            <input type="text" name="city" id="city" class="validate" required data-length="50" maxlength="50" minlength="3"
                            value="{{ $city->city or old('city') }}">
                            <label data-error="incorrecto" data-success="correcto" for="city">Ciudad</label>
                        </div>
                    </div>
                    <a href="/city" class="btn-flat waves-effect waves-red red-text text-darken-3">Atr&aacute;s</a>
                    <button class="btn yellow darken-3 waves-effect right" type="submit">Guardar</button>
                </form>
            </div>
        </div>
    @endsection
