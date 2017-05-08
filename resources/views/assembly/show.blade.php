@extends('layouts.main')

    @section('title')
        Ver Asamblea
    @endsection

    @section('content')
        <div class="row card-panel white">
            <h4>{{ $assembly->assembly }}</h4>
            <h6><strong>Fecha: </strong>{{ $assembly->date }}</h6>
            <div class="divider"></div>
            <textarea class="materialize-textarea" readonly>{{ $assembly->record }}</textarea>
            <a href="/assembly" class="btn-flat waves-effect">Atras</a>
            <div class="fixed-action-btn">
                <a  class="btn-floating btn-large red pulse">
                    <i class="large material-icons">add</i>
                </a>
                <ul>
                    <li><a href="/attendance/{{ $assembly->id }}" data-position="left" data-delay="50" data-tooltip="Ver asistencia" class="tooltipped btn-floating deep-orange"><i class="material-icons">done_all</i></a></li>
                    <li><a href="/listTopic/{{ $assembly->id }}" data-position="left" data-delay="50" data-tooltip="Ver temas" class="tooltipped btn-floating yellow darken-3"><i class="material-icons">reorder</i></a></li>
                    <li><a href="/assembly/{{ $assembly->id }}/edit" data-position="left" data-delay="50" data-tooltip="Editar" class=" tooltipped btn-floating blue"><i class="material-icons">edit</i></a></li>
                </ul>
            </div>
        </div>
    @endsection
