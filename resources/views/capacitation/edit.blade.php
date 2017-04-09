    @extends('layouts.main')

        @section('title')
            Editar Capacitación
        @endsection

        @section('content')
            <div class="section white z-depth-1">
                @include('layouts.errors')
                <div class="row">
                    <form class="col s10 offset-s1" action="/capacitation/{{ $capacitation->id }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="row">
                            <div class="col s12 m6 input-field">
                                <input type="text" name="id" value="{{ $capacitation->id }}" hidden>
                                <input type="text" name="capacitation" id="capacitation" class="validate" required data-length="70" maxlength="70" minlength="3" value="{{ $capacitation->capacitation or old('capacitation')}}">
                                <label data-error="incorrecto" data-success="correcto" for="capacitation">Capacitación</label>
                            </div>
                            <div class="col s12 m6 input-field">
                                <input type="text" name="imparting" id="imparting" class="validate" required data-length="70" maxlength="70" minlength="3" value="{{ $capacitation->imparting or old('imparting')}}">
                                <label data-error="incorrecto" data-success="correcto" for="imparting">Impartidor</label>
                            </div>
                            <div class="col s12 m3  input-field">
                                <input type="text" name="hours" id="hours" onkeypress="return isNumberKey(event);" required value="{{ $capacitation->hours or old('hours')}}">
                                <label data-error="incorrecto" data-success="correcto" for="hours">Horas</label>
                            </div>
                            <div class="col s12 m9  input-field">
                                <input type="text" name="place" id="place" required value="{{ $capacitation->place or old('place')}}">
                                <label data-error="incorrecto" data-success="correcto" for="place">Lugar</label>
                            </div>
                            <div class="col s12 m6 input-field">
                                <input type="date" name="finalized_date" id="imparted_date" class="datepicker" required value="{{ $capacitation->imparted_date or old('imparted_date')}}">
                                <label data-error="incorrecto" data-success="correcto" for="imparted_date">Fecha de inicio</label>
                            </div>
                            <div class="col s12 m6 input-field">
                                <input type="date" name="finalized_date" id="finalized_date" class="datepicker" required value="{{ $capacitation->finalized_date or old('finalized_date')}}">
                                <label data-error="incorrecto" data-success="correcto" for="finalized_date">Fecha de finalización</label>
                            </div>
                        </div>
                        <a href="/capacitation" class="btn-flat waves-effect waves-red red-text text-darken-3">Atr&aacute;s</a>
                        <button class="btn yellow darken-3 waves-effect right" type="submit">Agregar</button>
                    </form>
                </div>
            </div>
        @endsection
