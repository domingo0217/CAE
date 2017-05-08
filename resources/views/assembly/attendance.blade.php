@extends('layouts.main')

    @section('title')
        Asistencia
    @endsection

    @section('content')
        <div class="row card-panel white">
            <p>
                <strong> {{ $assembly->assembly }} </strong> &nbsp;
                <strong>Fecha: </strong>{{ $assembly->date }} &nbsp;
            </p>
            <div class="divider"></div>
                @if(!empty($members[0]))
                    <div class="collection">
                        <?php $i = 0; ?>
                        @foreach($members as $member)
                            <a class="collection-item">
                                {{ $member->id.' &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; '.$member->name.' '.$member->lastname }}</a>
                            </a>
                            <?php $i++; ?>
                        @endforeach
                    </div>
                @else
                    <h5 class="grey-text center">Actualmente no hay miembros!</h5>
                @endif
            <div class="divider"></div>
            <a href="/assembly/{{ $assembly->id }}" class="btn-flat waves-effect">Atras</a>
            <div class="fixed-action-btn">
                <a class="btn-floating btn-large red pulse">
                  <i class="large material-icons">add</i>
                </a>
                <ul>
                  <li><a href="/addAttendance/{{ $assembly->id }}" class="btn-floating yellow darken-3 hoverable tooltipped" data-position="left" data-delay="50" data-tooltip="Pasar asistencia"><i class="material-icons">done</i></a></li>
                  <li><a href="/editAttendance/{{ $assembly->id }}" class="btn-floating deep-orange hoverable tooltipped" data-position="left" data-delay="50" data-tooltip="Editar asistencia"><i class="material-icons">edit</i></a></li>
                </ul>
            </div>
        </div>
    @endsection
