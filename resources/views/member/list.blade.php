@extends('layouts.main')
    @section('title')
        Lista de Miembros
    @endsection

    @section('content')
        {{ dd($member) }}
        <div class="row">
            <div class="section white z-depth-1">
                @include('layouts.status')
                <table class="stripped responsive centered">
                    <thead>
                        <tr>
                            <th data-field="id">C&eacute;dula</th>
                            <th data-field="delegation">Nombre</th>
                            <th data-field="delegation">Apellido</th>
                            <th data-field="delegation">Nacionalidad</th>
                            <th data-field="delegation">Fecha de Nacimiento</th>
                            <th data-field="delegation">Estado Civil</th>
                            <th data-field="delegation">Telef&oacute;no</th>
                            <th data-field="delegation">Correo Electr&oacute;nico</th>
                            <th data-field="delegation">Direcci&oacute;n</th>
                            <th data-field="delegation">Ciudad</th>
                            <th data-field="delegation">Delegaci&oacute;n</th>
                            <th data-field="">
                                <a class="btn-floating tooltipped btn-large waves-effect waves-light yellow darken-3 hoverable center" href="/member/create" data-position="top" data-delay="50" data-tooltip="Agregar">
                                    <i class="material-icons">add</i>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($member as $members)
                            <tr>
                                <td>{{ $members->id }}</td>
                                <td>{{ $members->name }}</td>
                                <td>{{ $members->lastname }}</td>
                                <td>{{ $members->nationality }}</td>
                                <td>{{ $members->birthdate }}</td>
                                <td>{{ $members->civil_status }}</td>
                                <td>{{ $members->telephone }}</td>
                                <td>{{ $members->email }}</td>
                                <td>{{ $members->address }}</td>
                                <td>{{ $members->city }}</td>
                                <td>{{ $members->delegation }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $member->links() }}
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
