@extends('layouts.main')

    @section('title')
        Editar asistencia
    @endsection

    @section('content')
        <div class="row card-panel white">
            @include('layouts.status')
            @include('layouts.statusNeg')
            <div >
                <form action="/search2AssemblyMember/{{ $assembly->id }}" method="post">
                    {{ csrf_field() }}
                    <div class="input-field">
                        <input id="search" type="search" name="search" required class="tooltipped" data-position="top" data-delay="50" data-tooltip="Buscar">
                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                    </div>
                </form>
            </div>
            <p>
                <strong> {{ $assembly->assembly }} </strong> &nbsp;
                <strong>Fecha: </strong>{{ $assembly->date }} &nbsp;
            </p>
            <div class="divider"></div>
            <form action="/updateAttendance/{{ $assembly->id }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    @if(!empty($members[0]))
                        <div class="collection">
                            <?php $i = 0; ?>
                            @foreach($members as $member)
                                <a class="collection-item">
                                    <input type="checkbox" name="members[]" id="{{ $i }}" value="{{ $member->id }}">
                                    <label class="black-text" for="{{ $i }}">{{ $member->id.' &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; '.$member->name.' '.$member->lastname }}</label>
                                </a>
                                <?php $i++; ?>
                        @endforeach
                        </div>
                    @else
                        <h5 class="grey-text center">Actualmente no hay miembros!</h5>
                    @endif
                    {{-- <a href="/capacitation/{{ $capacitation->id }}" class="btn btn-flat waves-effect">Atras</a> --}}
                    <button type="submit" class="btn yellow darken-3 hoverable waves-effect right" name="button">Guardar</button>
            </form>
            <div class="divider"></div>
            <a href="/attendance/{{ $assembly->id }}" class="btn-flat waves-effect">Atras</a>
        </div>
    @endsection
