@extends('layouts.main')

    @section('title')
        Crear Asamblea
    @endsection

    @section('content')
        <div class="row card-panel white">
            @include('layouts.errors')
            <form action="/assembly" method="post">
                {{ csrf_field() }}
                <div class="col s12 m6 input-field">
                    <?php $nombre = 'Asamblea General'; ?>
                    <input type="text" name="" value="{{ old('assembly') or $nombre }}"required class="validate" minlength="8">
                    <label for="assembly" data-success="correcto" data-error="incorrecto">Asamblea</label>
                </div>
                <div class="col s12 m6 input-field">
                    <input type="date" class="datepicker" name="date" value="{{ old('date') }}" required class="validate">
                    <label for="date" data-success="correcto" data-error="incorrecto">Fecha</label>
                </div>
                <div class="col s12 input-field">
                    <textarea name="record" id="textarea" class="materialize-textarea" required>
                        {{ old('record') }}
                    </textarea>
                    <label for="textarea">Acta</label>
                </div>
                <div class="col s12 input-field">
                    <a href="/assembly" class="btn-flat waves-effect">Atras</a>
                    <button type="submit" class="btn yellow darken-3 right">Guardar</button>
                </div>
            </form>
        </div>
    @endsection
