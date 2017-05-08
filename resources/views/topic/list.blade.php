@extends('layouts.main')

    @section('title')
        Lista de temas
    @endsection

    @section('content')
        <div class="row card-panel white">
            @include('layouts.status')
            @include('layouts.statusNeg')
            <table class="responsive-table highlight centered">
                <thead>
                    <tr>
                        <th data-field=''>Tema</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if($topic->count() > 0)
                        @foreach ($topic as $topics)
                            <tr>
                                <td>{{ $topics->topic }}</td>
                                <td>
                                    <a href="/topic/{{ $topics->id }}" class="btn-floating btn-flat waves-effect"><i class="material-icons yellow-text text-darken-3">visibility</i></a>
                                    <a href="/topic/{{ $topics->id }}/edit" class="btn-floating btn-flat waves-effect"><i class="material-icons yellow-text text-darken-3">edit</i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            @if($topic->count() == 0)
                <h5 class="grey-text text-lighten-1 center">No hay temas actualmente.</h5>
            @endif
            <div class="divider"></div>
            <a href="/assembly/{{ $assembly->id }}" class="btn-flat waves-effect">Atras</a>
            <div class="fixed-action-btn">
                <a href="/topic/create/{{ $assembly->id }}" class="btn-floating btn-large red tooltipped" data-position="left" data-delay="50" data-tooltip="Agregar tema">
                    <i class="large material-icons">add</i>
                </a>
            </div>
        </div>
    @endsection
