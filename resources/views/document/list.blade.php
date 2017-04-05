@extends('layouts.main')
    @section('title')
        Lista de Documentos
    @endsection

    @section('content')
        <div class="row">
            <div class="section white z-depth-1">
                @include('layouts.status')
                {{-- <div class="">
                    <form action="searchDocument" method="post">
                        {{ csrf_field() }}
                        <div class="input-field">
                            <input id="search" type="search" name="search" required class="tooltipped" data-position="top" data-delay="50" data-tooltip="Buscar">
                            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                    </form>
                </div> --}}
                <table class="stripped responsive centered">
                    <thead>
                        <tr>
                            <th data-field="id">C&oacute;digo</th>
                            <th data-field="capacitation">Documentos</th>
                            <th data-field="imparting">Introducido</th>
                            <th data-field="">
                                <a class="btn-floating tooltipped btn-large waves-effect waves-light yellow darken-3 hoverable center" href="/document/create" data-position="top" data-delay="50" data-tooltip="Agregar">
                                    <i class="material-icons">add</i>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($document as $documents)
                            <tr>
                                <td>{{ $documents->id }}</td>
                                <td>{{ $documents->document }}</td>
                                <td>{{ $documents->created_at }}</td>
                                <td>
                                    <a href="/document/{{ $documents->id }}/edit" class="btn-floating btn-flat waves-effect waves-dark white tooltipped" data-position="right" data-delay="50" data-tooltip="Editar">
                                        <i class="material-icons yellow-text text-darken-3">edit</i>
                                    </a>
                                    <form method="post" action="/document/{{$documents->id}}" style="Display:inline;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" name="submit" class="btn-floating btn-flat waves-effect waves-dark white tooltipped" data-position="right" data-delay="50" data-tooltip="Eliminar">
                                            <i class="material-icons yellow-text text-darken-3">delete</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $document->links() }}
                <ul class="pagination center">
                    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                    <li class="active"><a href="#!">1</a></li>
                    <li class="waves-effect"><a href="#!">2</a></li>
                    <li class="waves-effect"><a href="#!">3</a></li>
                    <li class="waves-effect"><a href="#!">4</a></li>
                    <li class="waves-effect"><a href="#!">5</a></li>
                    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                </ul>
            </div>
        </div>
    @endsection
