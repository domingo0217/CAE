@extends('layouts.main')
    @section('title')
        Lista de Delegaciones
    @endsection

    @section('content')
        <div class="row">
            <div class="section white z-depth-1">
                @include('layouts.status')
                <div class="">
                    <form action="searchDelegation" method="post">
                        {{ csrf_field() }}
                        <div class="input-field">
                            <input id="search" type="search" name="search" required class="tooltipped" data-position="top" data-delay="50" data-tooltip="Buscar">
                            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                    </form>
                </div>
                <table class="stripped responsive centered">
                    <thead>
                        <tr>
                            <th data-field="id">C&oacute;digo</th>
                            <th data-field="delegation">Delegaciones</th>
                            <th data-field="">
                                <a class="btn-floating tooltipped btn-large waves-effect waves-light yellow darken-3 hoverable center" href="/delegation/create" data-position="top" data-delay="50" data-tooltip="Agregar">
                                    <i class="material-icons">add</i>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($delegation as $delegations)
                            <tr>
                                <td>{{ $delegations->id }}</td>
                                <td>{{ $delegations->delegation }}</td>
                                <td>
                                    <a href="/delegation/{{ $delegations->id }}/edit" class="btn-floating btn-flat waves-effect waves-dark tooltipped" data-position="top" data-delay="50" data-tooltip="Editar">
                                        <i class="material-icons yellow-text text-darken-3">edit</i>
                                    </a>
                                    <form method="post" action="/delegation/{{$delegations->id}}" style="display:inline;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" name="submit" class="btn-floating btn-flat waves-effect waves-dark tooltipped" data-position="top" data-delay="50" data-tooltip="Eliminar">
                                            <i class="material-icons red-text text-darken-3">delete</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $delegation->links() }}
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
