@extends('layouts.main')
    @section('title')
        Asambleas
    @endsection

    @section('content')
        <div class="row card-panel white">
            @include('layouts.status')
            @include('layouts.statusNeg')
            <div class="">
                <form action="/searchAssembly" method="post">
                    {{ csrf_field() }}
                    <div class="input-field">
                        <input id="search" type="search" name="search" required class="tooltipped" data-position="top" data-delay="50" data-tooltip="Buscar">
                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                    </div>
                </form>
            </div>
            <table class="responsive-table highlight centered">
                <thead>
                    <tr>
                        <th data-field=''>Nombre</th>
                        <th data-field=''>Fecha</th>
                        <th data-field=''>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if($assembly->count() > 0)
                        @foreach ($assembly as $assemblies)
                            <tr>
                                <td>Asamblea General</td>
                                <td>{{ $assemblies->date }}</td>
                                <td>
                                    <a href="/assembly/{{ $assemblies->id }}" class="btn-floating btn-flat waves-effect"><i class="material-icons yellow-text text-darken-3">visibility</i></a>
                                    <a href="/assembly/{{ $assemblies->id }}/edit" class="btn-floating btn-flat waves-effect"><i class="material-icons yellow-text text-darken-3">edit</i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            @if($assembly->count() == 0)
                <h5 class="grey-text text-lighten-1 center">No hay asambleas actualmente.</h5>
            @endif
            <div class="divider"></div>
            <div class="fixed-action-btn">
                <a href="/assembly/create" class="btn-floating btn-large red tooltipped" data-position="top" data-delay="50" data-tooltip="Agregar">
                    <i class="large material-icons">add</i>
                </a>
                {{-- <ul>
                    <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
                    <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
                    <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
                    <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
                </ul> --}}
            </div>
            <a href="/assembly" class="btn btn-flat waves-effect">Atras</a>
        </div>
    @endsection
